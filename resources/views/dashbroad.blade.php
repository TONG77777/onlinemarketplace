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
                                                        @if ($product->id == $item->product_id)
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
                                                    @endforeach
                                                    @if ($product->id != $item->product_id)
                                                        <div class="btn-">
                                                            <button type="submit" class="btn "
                                                                style="background:#293d3d;color:azure" disabled><i
                                                                    class="bi bi-clipboard2-check"></i></button>
                                                        </div>
                                                    @endif
                                                </td>

                                                {{-- //Deliver --}}
                                                <td>
                                                    @foreach ($order as $item)
                                                        @if ($product->id == $item->product_id)
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
                                                    @endforeach
                                                    @if ($product->id != $item->product_id)
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
                                                                style="background:#55A597;color:azure"><i
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
                                                                style="background: #3F8290;color:azure"><i
                                                                    class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                        </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container pt-5 my-5" style="min-height: 400px;height:auto;">
                            {{-- //when product mark_as_sold --}}
                            @php
                                $soldProducts = App\Models\Product::where('user_id', Auth::user()->id)
                                    ->where('mark_as_sold', 1)
                                    ->get();
                            @endphp
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

                                            @foreach ($soldProducts as $product)
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
                                                <td>{{ __('RM') }} {{ $product->price }}</td>
                                                <td scope="row">{{ $product->updated_at }}</td>
                                                <td>{{ $product->condition }}</td>
                                                <td>
                                                    @foreach ($categories as $category)
                                                        @if ($category->id == $product->category)
                                                            {{ $category->name }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                        </tr>
                            @endforeach

                            </tbody>
                            @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            {{ __('You have no products yet. Try to add some...') }}
        </div>
        @endif
    </div>
    </div>
@endsection
