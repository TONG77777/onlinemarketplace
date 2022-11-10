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
    <div class="container pt-5 my-5" style="height: 450px">

        <button style="submit" class="float-end"><a
                href="{{ route('seller.products.create') }}">{{ __('Add New Product') }}</a></button>
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
                    <th scope="col">{{ __('Mask As Sold') }}</th>
                    <th scope="col">{{ __('Delete') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $product)
                        <th scope="row"><a href="products/{{ $product->id }}"><img
                                    src="img/products/{{ $product->image }}" style="width:60px;height:60px;"
                                    alt=""></a></th>
                        <div class="portfolio-info">
                            <td><a href="products/{{ $product->id }}" class="">{{ $product->name }}</a></td>
                        </div>
                        <td>{{ __('RM') }} {{ $product->price }}</td>
                        <td scope="row">{{ $product->updated_at }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>{{ $product->category }}</td>
                        <td>
                            <div class="btn-"><a href="{{ route('seller.products.edit', $product->id) }}"
                                    class=""><i class="bi bi-pen"></i></a></div>
                        </td>
                        <td><a href="#" class="btn-"><i class="bi bi-check-square-fill"></i></a></td>
                        <td>
                            <div class="btn-">
                                <form action="/products/{{ $product->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-link"><i
                                            class="bi bi-trash-fill" style="color:red"></i></button>
                                </form>
                            </div>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
