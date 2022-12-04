@extends('layouts.layout')

@section('content')

    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li>{{ __('Review Product') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <div class="container pt-5 my-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div class="row justify-content-center" style="height:auto; min-height:550px">

        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">

                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <h6 class="border-bottom pb-2 mb-0">Reivew of product</h6>
                        <div class="d-flex text-muted pt-3">
                            @php
                                $product = App\Models\Product::find($order->product_id);
                                $images = App\Models\Image::where('product_id', $order->product_id)->get();
                            @endphp

                        @foreach ($images as $image)
                            @if ($loop->first)
                                <img src="/img/products/{{ $image->url }}" class="img-fluid" alt="image"
                                width="100px" height="100px">
                            @endif
                        @endforeach

                            <p>
                                <strong class="d-block text-gray-dark">Order Id : #{{ $order->product_id }}</strong>
                                @if ($order->product_id == $product->id)
                                    <strong class="d-block text-gray-dark">Product Name : {{ $product->name }}</strong>
                                @endif
                            </p>
                        </div>
                    </div>
                    <!-- Product Details Form -->
                    <form class="row g-3" action="{{ route('review.store', $order->id) }}" enctype="multipart/form-data"
                        method="POST">
                        {{-- {{ route('reviews.store') }} --}}
                        @csrf
                        <div class="rating-css">
                            <input type="radio" id="rating-1" name="rating" value="1" /><label
                                for="rating-1">1</label>
                            <input type="radio" id="rating-2" name="rating" value="2" /><label
                                for="rating-2">2</label>
                            <input type="radio" id="rating-3" name="rating" value="3" /><label
                                for="rating-3">3</label>
                            <input type="radio" id="rating-4" name="rating" value="4" checked="checked" /><label
                                for="rating-4">4</label>
                            <input type="radio" id="rating-5" name="rating" value="5" /><label
                                for="rating-5">5</label>
                        </div>

                        <label for="review">{{ __('Review') }}</label>
                        <textarea class="form-control" name="comment" id="review" rows="3" placeholder="Enter your comment..."></textarea>
                        <br>
                        <button type="submit" class="btn btn-submit">{{ __('Submit') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
