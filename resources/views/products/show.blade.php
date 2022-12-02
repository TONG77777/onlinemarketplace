@extends('layouts.layout')

@section('content')
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
        <section id="portfolio-details" class="portfolio-details">
            <div class="container" data-aos="fade-up">
                <div class="mx-auto" style="width: 400px">
                    <div class="card-body">

                        <!-- Slides with controls -->
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @php
                                    $images = App\Models\Image::where('product_id', $product->id)->get();
                                @endphp

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

                                    @php
                                        $user = App\Models\User::where('id', $product->user_id)->get();
                                        
                                    @endphp

                                    @foreach ($user as $u)
                                        <h3>{{ $u->name }}</h3>
                                    @endforeach

                                    @foreach ($user as $u)
                                        <h4> <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $u->email }}&su={{ $product->name }}&body={{ __('I am interested in your product...') }}"
                                                target="_blank">{{ $u->email }}</a></h4>
                                    @endforeach

                                    @foreach ($user as $u)
                                        @php
                                            $now = Carbon\Carbon::now();
                                            $date = Carbon\Carbon::parse($u->created_at);
                                            $diff = $now->diffInDays($date);
                                        @endphp
                                        <h4>{{ __('Joined ') }}{{ $diff }}{{ __(' days ago') }}</h4>
                                    @endforeach

                                </div>
                            </div>

                            {{-- <h3>{{ __('Delivery  :') }}</h3>
                            <p>{{ __('Option 1') }}</p>
                            <p>{{ __('Option 2') }}</p>
                            </p> --}}

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>{{ __('Product Infromation') }}</h3>
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
                                    @foreach ($user as $u)
                                        <li><a href="/chatify/{{ $u->id }}" class="btn-contact">
                                                {{ __('Contact ') }}<i class="bi bi-person-lines-fill"></i></a></li>
                                    @endforeach

                                    <li>
                                        <form action="{{ route('checkout.store', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-buy">{{ __('Buy Now') }}<i
                                                    class="bi bi-cart-check-fill"></i>
                                    </li></button>

                                    </form>
                                @elseif ($product->user_id == Auth::user()->id)
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
                        
                            @php
                                $count = App\Models\Counter::where('id', $product->id)->get();
                            @endphp
                        
                            @foreach ($count as $c)
                            @if($c->id == $product->id)
                                {{ __('Total Views : ') }} {{ $c->views }}
                            @endif
                            @endforeach
                      

                                
                            </h3>
                            {{-- <ul> 
                                    <u><li><a href="{{route('seller.products.edit', $product->id)}}" class="btn-"> Edit Product <i class="bi bi-pencil-square"></i></a></li></u>
                                    <u><li><a href="#" class="btn-"> Mask as Sold <i class="bi bi-check-square-fill"></i></a></li></u>
                                    <u><li>
                                    <form action="/products/{{$product->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete Product </i></button>
                                    </form>
                                </li></u>
                                </ul> --}}
                            </ul>
                        </div>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection
