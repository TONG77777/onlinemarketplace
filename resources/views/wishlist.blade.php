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


    <div class="container pt-5 my-5" style="min-height:500px;height:auto;">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('Image') }}</th>
                    <th scope="col">{{ __('Product') }}</th>
                    <th scope="col">{{ __('Price') }}</th>
                    <th scope="col">{{ __('Condition') }}</th>
                    <th scope="col">{{ __('Buy Now') }}</th>
                    <th scope="col">{{ __('Remove') }}</th>
                </tr>
            </thead>
            <tbody>

                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $wish)
                        <tr>
                            <th scope="row"><a href="products/{{ $wish->product_id }}">
                                    @php
                                        $images = App\Models\Image::where('product_id', $wish->product_id)->get();
                                        $product = App\Models\Product::find($wish->product_id);
                                        $mark_as_sold = App\Models\Product::where('mark_as_sold', 0)->get();
                                    @endphp
                                    @if ($product->mark_as_sold == 0)
                                        @foreach ($images as $image)
                                            @if ($loop->first)
                                                <img src="/img/products/{{ $image->url }}"
                                                    style="width:60px;height:60px;" alt="">
                                            @endif
                                        @endforeach
                                </a></th>
                            <div class="portfolio-info">
                                <td><a href="products/{{ $wish->product_id }}"
                                        class="">{{ $wish->product->name }}</a></td>
                            </div>
                            <td>{{ __('RM') }} {{ $wish->product->price }}</td>
                            <td scope="row">{{ $wish->product->condition }}</td>
                            <td>
                                <form action="{{ route('checkout.store', $wish->product_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn" style="background: #00b6a1;color:azure"><i
                                            class="bi bi-bag-fill"></i></button>
                                </form>
                            </td>

                            </td>
                            <td>
                                <form action="{{ route('wishlist.destroy', $wish->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                </form>
                    @endif
                    </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">{{ __('No Wishlist') }}</td>
                </tr>
                @endif
            </tbody>


        </table>
    </div>
@endsection
