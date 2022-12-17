@extends('layouts.layout')
@section('content')
    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li>{{ __('Dashbroad') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->


    <div class="container pt-5 my-5" style="height:auto;min-height:500px">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dashbroad List</h5>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation"> <button class="nav-link active" id="home-tab"
                            data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Custom</button></li>
                    <li class="nav-item" role="presentation"> <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false" tabindex="-1">History - Product Sold</button></li>

                </ul>
                <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <button type="submit" class="float-end btn" style="background: #00b6a1"><a
                                href="{{ route('seller.products.create') }}"
                                style="color: azure">{{ __('+ Add New Product') }}</a></button>
                        <div class="container pt-5 my-5" style="min-height: 400px;height:auto;">

                            @if ($products->count() > 0)
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('Image') }}</th>
                                            <th scope="col">{{ __('Product') }}</th>
                                            <th scope="col">{{ __('Updated At') }}</th>
                                            <th scope="col">{{ __('Condition') }}</th>
                                            <th scope="col">{{ __('Category') }}</th>
                                            <th scope="col">{{ __('Confirm') }}</th>
                                            <th scope="col">{{ __('Deliver') }}</th>
                                            <th scope="col">{{ __('Edit') }}</th>
                                            <th scope="col">{{ __('Mark As Sold') }}</th>
                                            <th scope="col">{{ __('Delete') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            @foreach ($products as $product)
                                                @php
                                                    $images = App\Models\Image::where('product_id', $product->id)->get();
                                                    
                                                @endphp
                                                @foreach ($images as $image)
                                                    @if ($loop->first)
                                                        <th scope="row"><img src="/img/products/{{ $image->url }}"
                                                                style="width:60px;height:60px;" alt=""></a></th>
                                                    @endif
                                                @endforeach


                                                <div class="portfolio-info">
                                                    <td>{{ $product->name }}</a></td>
                                                </div>
                                                <td scope="row">{{ $product->updated_at }}</td>
                                                <td>{{ $product->condition }}</td>
                                                <td>
                                                    @foreach ($categories as $category)
                                                        @if ($category->id == $product->category)
                                                            {{ $category->name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @php
                                                        $order = App\Models\Order::all();
                                                    @endphp
                                                    @foreach ($order as $item)
                                                        @if ($product->id == $item->product_id && $item->status != 'confirmed' && $item->status != 'shipping')
                                                            <div class="btn-">
                                                                <form action="{{ route('order.confrim', $item->id) }}"
                                                                    method="PUT">
                                                                    @csrf

                                                                    <button type="submit" class="btn btn-success"
                                                                        style="background:#DED8C2"><i
                                                                            class="bi bi-clipboard2-check"></i></button>
                                                                </form>
                                                            </div>
                                                        @endif


                                                        @if ($product->id != $item->product_id || $item->status == 'confirmed' || $item->status == 'shipping')
                                                            <div class="btn-">
                                                                <button type="submit" class="btn "
                                                                    style="background:#293d3d;color:azure" disabled><i
                                                                        class="bi bi-clipboard2-check"></i></button>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>

                                                {{-- //Deliver --}}
                                                <td>
                                                    @foreach ($order as $item)
                                                        @if ($product->id == $item->product_id && $item->status == 'confirmed')
                                                            <div class="btn-">
                                                                <form action="{{ route('order.shipping', $item->id) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn"
                                                                        style="background: #9ACAA5"><i
                                                                            class="bi bi-box-seam-fill"></i></button>
                                                                </form>
                                                            </div>
                                                        @endif

                                                        @if ($product->id != $item->product_id || $item->status != 'confirmed')
                                                            <div class="btn-">
                                                                <form action="{{ route('order.shipping', $product->id) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <button type="submit" class="btn"
                                                                        style="background:#293d3d;color:azure" disabled><i
                                                                            class="bi bi-box-seam-fill"></i></button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                    @endforeach


                                                </td>
                                                <td>
                                                    <div class="btn-">
                                                        <form action="{{ route('seller.products.edit', $product->id) }}"
                                                            method="GET">
                                                            @csrf
                                                            <button type="submit" class="btn"
                                                                style="background: #75B79E"><i class="bi bi-brush"
                                                                    style="color: azure"></i></button>
                                                        </form>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="btn-">
                                                        <form
                                                            action="{{ route('seller.products.markAsSold', $product->id) }}"
                                                            method="PUT">
                                                            @csrf

                                                            <button type="submit" class="btn"
                                                                style="background:#55A597;color:azure"
                                                                onclick="markAsSold()"><i
                                                                    class="bi bi-check-circle-fill"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-">
                                                        <form action="{{ route('seller.products.delete', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn"
                                                                style="background: #3F8290;color:azure"
                                                                onclick="deleteProduct()"><i
                                                                    class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                        </tr>
                                    
                                
                            @endforeach
                        </tbody>
                    </table>
                            @else
                            <div class="alert alert-info">
                                {{ __('You have no products yet. Try to add some...') }}
                            </div>
                            @endif

                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container pt-5 my-5" style="min-height: 400px;height:auto;">

                            {{-- {{dd($soldProducts)}} --}}
                            @if ($soldProducts->count() > 0)
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('Image') }}</th>
                                            <th scope="col">{{ __('Product') }}</th>
                                            <th scope="col">{{ __('Price') }}</th>
                                            <th scope="col">{{ __('Updated At') }}</th>
                                            <th scope="col">{{ __('Condition') }}</th>
                                            <th scope="col">{{ __('Category') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            @foreach ($soldProducts as $soldProduct)
                                                @php
                                                    $images = App\Models\Image::where('product_id', $soldProduct->id)->get();
                                                    
                                                @endphp
                                                @foreach ($images as $image)
                                                    @if ($loop->first)
                                                        <th scope="row"><img src="/img/products/{{ $image->url }}"
                                                                style="width:60px;height:60px;" alt=""></a></th>
                                                    @endif
                                                @endforeach


                                                <div class="portfolio-info">
                                                    <td>{{ $soldProduct->name }}</a></td>
                                                </div>
                                                <td>{{ __('RM') }} {{ $soldProduct->price }}</td>
                                                <td scope="row">{{ $soldProduct->updated_at }}</td>
                                                <td>{{ $soldProduct->condition }}</td>
                                                <td>
                                                    @foreach ($categories as $category)
                                                        @if ($category->id == $soldProduct->category)
                                                            {{ $category->name }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                           
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
<script>
    function deleteProduct() {
        event.preventDefault();
        var form = event.target.form;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                    'Deleted!',
                    'Your product has been deleted.',
                    'success'
                )
            } else {
                Swal.fire(
                    'Cancelled',
                    'Your product is safe :)',
                    'error'
                )
            }
        })
    }

    function markAsSold() {
        event.preventDefault();
        var form = event.target.form;
        Swal.fire({
            title: 'Are you sure you want to mark this product as sold?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Marked product!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                    'Success!',
                    'Your product has been marked as sold.',
                    'success'
                )
            } else {
                Swal.fire(
                    'Cancelled',
                    'Your product is not marked as sold :)',
                    'error'
                )
            }
        })
    }
</script>
