@extends('layouts.layout')
@section('content')
    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li>{{ __('Your Wishlist') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->


    <div class="container pt-5 my-5" style="">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('Image') }}</th>
                    <th scope="col">{{ __('Product') }}</th>
                    <th scope="col">{{ __('Price') }}</th>
                    <th scope="col">{{ __('Condition') }}</th>
                    <th scope="col">{{ __('Category') }}</th>
                    <th scope="col">{{ __('Like') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $product)
                        <th scope="row"><a href="products/{{ $product->id }}"><img
                                    src="img/products/{{ $product->image }}" style="width:150px;height:150px;"
                                    alt=""></a></th>
                        <div class="portfolio-info">
                            <td><a href="products/{{ $product->id }}" class="">{{ $product->name }}</a></td>
                        </div>
                        <td>{{ __('RM') }} {{ $product->price }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>{{ $product->category }}</td>
                        <td><button type="button" class="btn btn-light "><i class="bi bi-heart-fill"
                                    style="color:red"></i></button>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
