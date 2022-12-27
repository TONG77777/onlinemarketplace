@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }
    </style>
    <main id="main">

        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">

                            <h2>{{ __('Product Details') }}</h2>
                            <p>{{ __('Some description about the product') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Product Desciption') }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details" style="height: auto">
            <div class="container" data-aos="fade-up">
                <div class="mx-auto" style="width: 400px">
                    <div class="card-body">

                        <!-- Slides with controls -->
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                @foreach ($images as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="/img/products/{{ $image->url }}" class="d-block w-100"
                                            style="width:400px;min-height:500px; max-height:500px;" alt="image">
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>

                </div>


                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <h2>{{ $product->name }}</h2>
                            <h3>{{ __('RM') }} {{ $product->price }}</h3>
                            <P>
                                {{ __('Condition  :') }} {{ $product->condition }}
                            </P>

                            </p>
                            <h4>{{ __('Description :') }} </h4>
                            <p>
                                {{ $product->description }}
                            </p>

                            <div class="testimonial-item">
                                <div>
                                    <img src="/img/p1.png" class="testimonial-img" alt="">

                                    <h3>{{ $user->name }}</h3>

                                    <h4> <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $user->email }}&su={{ $product->name }}&body={{ __('I am interested in your product...') }}"
                                            target="_blank">{{ $user->email }}</a></h4>

                                    <h4>{{ __('Joined ') }}{{ $user->created_at->diffForHumans() }}</h4>
                                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                                        <h6 class="border-bottom pb-2 mb-0">{{ __('Reivew of @') }}{{ $user->name }}
                                        </h6>

                                        <div class="d-flex text-muted pt-3">

                                            <p class="pb-3 mb-0 small lh-sm border-bottom">
                                                @foreach ($reviews as $r)
                                                    @for ($i = 0; $i < $r->rating; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    <strong class="d-block text-gray-dark">@incognito</strong>

                                                    {{ $r->comment }}
                                                    <br>
                                                    <br>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <body class="vsc-initialized">
                                    <div class="container-xl">
                                        <div class="row">
                                            <h3 class="text-center">{{ __('Similar Products') }}</h3>
                                            <div class="col-md-10 mx-auto">
                                                <div id="myCarousel" class="carousel slide pointer-event"
                                                    data-ride="carousel" data-interval="0">

                                                    <!-- Wrapper for carousel items -->
                                                    <div class="carousel-inner">
                                                        
                                                        <div class="carousel-item active">
                                                            <div class="row">
                                                                @foreach ($similar_products as $similar_product)
                                                                    <div class="col-sm-4">
                                                                        <div class="thumb-wrapper">
                                                                            @php
                                                                                $similar_products_img = DB::table('images')
                                                                                    ->where('product_id', $similar_product->id)
                                                                                    ->get();
                                                                            @endphp

                                                                            @foreach ($similar_products_img as $similar_product_img)
                                                                                <div class="img-box">
                                                                                    @if ($loop->first)
                                                                                        <img src="/img/products/{{ $similar_product_img->url }}"
                                                                                            class="img-fluid" alt="image" style="height:250px;width:250px">
                                                                                    @endif

                                                                                </div>
                                                                            @endforeach
                                                                            <div class="thumb-content">
                                                                                <h4>{{ Str::limit($similar_product->name, 27)}}</h4>
                                                                                <p>{{ Str::limit($similar_product->description, 20) }}</p>
                                                                                <p class="item-price"><span>RM
                                                                                        {{ $similar_product->price }}</span>
                                                                                </p>
                                                                                <a href="/products/{{ $similar_product->id }}"
                                                                                    class="btn "
                                                                                    style="background: #75B79E;color:azure">View
                                                                                    <i class="fa fa-angle-right"></i></a>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </body>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>{{ __('Product Information') }}</h3>
                            <ul>
                                <li><strong>{{ __('Category') }}</strong> <span>
                                        @foreach ($categories as $category)
                                            @if ($category->id == $product->category)
                                                <a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                                @endif
                                @endforeach
                                </span></li>
                                <li><strong>{{ __('Publish Date') }}</strong>
                                    <span>{{ $product->created_at->format('d M Y') }}</span>
                                </li>

                                @if ($product->user_id != Auth::user()->id)
                                    <li><a href="/chatify/{{ $user->id }}" class="btn-contact">
                                            {{ __('Contact ') }}<i class="bi bi-person-lines-fill"></i></a></li>
                                    <li>
                                        <form action="{{ route('checkout.store', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-buy">{{ __('Buy Now') }}<i
                                                    class="bi bi-cart-check-fill"></i>
                                    </li></button>

                                    </form>
                                @else
                                    <ul>
                                        <li class="dropdown">
                                            <form action="{{ route('seller.products.edit', $product->id) }}"
                                                style="border:none;">
                                                @csrf
                                                <button type="submit" class="btn btn-link" style="color: #008374">
                                                    {{ __('Edit') }}
                                                    <i class="bi bi-pencil-square"></i></button>
                                            </form></a>

                                        </li>
                                        <li>
                                            <form action="{{ route('seller.products.markAsSold', $product->id) }}"
                                                method="PUT">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-link"
                                                    style="color: #008374">{{ __('Mark As Sold') }}<i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('seller.products.delete', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link"
                                                    style="color: #008374">{{ __('Delete') }}<i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </li>
                                @endif
                            </ul>
                            <h3>
                                {{ __('Total Views : ') }} {{ $counter->views }}
                            </h3>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            </div>
        </section>


    </main><!-- End #main -->
@endsection
