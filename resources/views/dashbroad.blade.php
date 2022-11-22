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


    <div class="container pt-5 my-5" style="height:400px;">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <button type="submit" class="float-end btn" style="background: #00b6a1"><a href="{{ route('seller.products.create') }}"
                style="color: azure">{{ __('+ Add New Product') }}</a></button>
        <div class="container pt-5 my-5" style="height: 400px">



            @if ($products->count() > 0)
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">{{ __('Image') }}</th>
                            <th scope="col">{{ __('Product') }}</th>
                            <th scope="col">{{ __('Price') }}</th>
                            <th scope="col">{{ __('Updated At') }}</th>
                            <th scope="col">{{ __('Condition') }}</th>
                            <th scope="col">{{ __('Category') }}</th>
                            <th scope="col">{{ __('Edit') }}</th>
                            <th scope="col">{{ __('Mark As Sold') }}</th>
                            <th scope="col">{{ __('Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($products as $product)
                                <th scope="row"><img src="img/products/{{ $product->image }}"
                                        style="width:60px;height:60px;" alt=""></a></th>
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
                                <td>
                                    <div class="btn-">
                                        <form action="{{ route('seller.products.edit', $product->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn" style="background: #00b6a1"><i
                                                    class="bi bi-pencil-square" style="color: azure"></i></button>
                                        </form>
                                    </div>
                                </td>

                                <td>
                                    <div class="btn-">
                                        <form action="" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-">
                                        <form action="/products/{{ $product->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                        </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    
    @else
        <div class="alert alert-info">
            {{ __('You have no products yet. Try to add some...') }}
        </div>
        @endif
    </div>
</div>
@endsection
