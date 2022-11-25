@extends('layouts.layout')

@section('content')
    <div class="container" data-aos="fade-up">
        <!-- ======= product Section ======= -->

        <div class="section-header">
            <h2>{{ __('Used Item') }}</h2>

            <form action="{{ url('/search') }}" method="get">
                @csrf
                <div class="input-group mb-3 mx-auto" style="width: 750px">
                    <input type="text" class="form-control" name="query" placeholder="Search Product Name...">
                    <div class="input-group-append">
                        <button class="btn btn-submit-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
            </form>
        </div>

        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif


    </div>

    <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
        data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 portfolio-container">

            @foreach ($products as $product)
                <div class="col-xl-4 col-md-6 portfolio-item filter-app">

                    <div class="portfolio-wrap">

                        <a href="/products/{{ $product->id }}">
                            @php
                                $images = App\Models\Image::where('product_id', $product->id)->get();
                            @endphp

                            @foreach ($images as $image)
                                @if ($loop->first)
                                    <img src="/img/products/{{ $image->url }}" class="img-fluid" alt="image"
                                        style="width:400px;min-height:500px; max-height:500px;">
                                @endif
                                @endforeach
                            <div class="portfolio-info">
                                    <h4><a href="/products/{{ $product->id }}"
                                            title="More Details">{{ $product->name }}</a>
                                    </h4>
                                    <p>{{ __('RM') }} {{ $product->price }}</p>
                                    <p>{{ $product->description }}</p>

                                    <form action="{{ route('wishlist.store', $product->id) }}" method="POST">
                                        @csrf
                                        @php
                                            $wishlist = App\Models\Wishlist::where('user_id', Auth::user()->id)->get();
                                        @endphp

                                        @if ($wishlist->contains('product_id', $product->id))
                                            <button type="submit" class="btn btn-submit-secondary float-end active">
                                                <i class="bi bi-heart-fill" style="color: red"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="btn .btn-light btn-rounded float-end"><i
                                                    class="bi bi-heart"></i></button>
                                        @endif

                                    </form>

                    </div>
                </div>
        </div><!-- End product Item -->
       
        @endforeach


        <div class="col-xl-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
            </div>
        </div>
    </div>
    </div><!-- End Product -->
    @empty($product)
        <div class="alert alert-danger">
            {{ __('No products found') }}
        </div>
    @endempty
    <section id="blog" class="blog">
        <div class="blog-pagination">
            <ul class="justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div><!-- End Product -->

    </section><!-- End Product -->

    </div>
    </section><!-- End product Section -->
    </div>
@endsection
