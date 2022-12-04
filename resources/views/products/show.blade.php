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
        <section id="portfolio-details" class="portfolio-details" style="height: auto">
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
                                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                                        @foreach($user as $u)
                                        <h6 class="border-bottom pb-2 mb-0">{{__('Reivew of @')}}{{$u->name}}</h6>
                                        @endforeach
                                        <div class="d-flex text-muted pt-3">
                                          <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                                    
                                          <p class="pb-3 mb-0 small lh-sm border-bottom">
                                            <strong class="d-block text-gray-dark">@username</strong>
                                            Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                                          </p>
                                        </div>
                                        <div class="d-flex text-muted pt-3">
                                          <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"></rect><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
                                    
                                          <p class="pb-3 mb-0 small lh-sm border-bottom">
                                            <strong class="d-block text-gray-dark">@username</strong>
                                            Some more representative placeholder content, related to this other user. Another status update, perhaps.
                                          </p>
                                        </div>
                                        <div class="d-flex text-muted pt-3">
                                          <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"></rect><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
                                    
                                          <p class="pb-3 mb-0 small lh-sm border-bottom">
                                            <strong class="d-block text-gray-dark">@username</strong>
                                            This user also gets some representative placeholder content. Maybe they did something interesting, and you really want to highlight this in the recent updates.
                                          </p>
                                        </div>
                                        <small class="d-block text-end mt-3">
                                          <a href="#">All Reviews</a>
                                        </small>
                                      </div>
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
                                    @if ($c->id == $product->id)
                                        {{ __('Total Views : ') }} {{ $c->views }}
                                    @endif
                                @endforeach
                            </h3>
                            </ul>
                        </div>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection
