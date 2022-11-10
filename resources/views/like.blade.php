@extends('layouts.layout')
@section('content')
    <div class="container pt-5 my-5" style="height: 500px">
        <table class="table">
            
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Condition</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $product)
                    <th scope="row">{{ $product->id }}</th>
                    <th scope="row"><a href="products/{{ $product->id }}"><img src="img/products/{{ $product->image }}" style="width:60px;height:60px;" alt=""></a></th>
                    <div class="portfolio-info">
                        <td><a href="products/{{ $product->id }}" class="">{{ $product->name }}</a></td>
                    </div>
                    <td>{{ __('RM') }} {{ $product->price }}</td>
                    <td>{{ $product->condition }}</td>
                </tr>
                    @endforeach
            </tbody>
        </table>

    </div>
@endsection
