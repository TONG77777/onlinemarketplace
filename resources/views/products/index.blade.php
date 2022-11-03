@extends('layouts.layout')

@section('content')
    <div class="container" data-aos="fade-up">
        <!-- ======= product Section ======= -->

        <div class="section-header">
            <h2>{{__('Used Item')}}</h2>

            <div class="input-group mb-3 mx-auto" style="width: 750px">
                <input type="text" class="form-control" placeholder="Search Product Name...">
                <div class="input-group-append">
                    <button class="btn btn-submit-secondary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>

        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">


            <div class="row gy-4 portfolio-container">

                <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        @foreach ($products as $product)
                            <a href=""><img src="img/products/{{ $product->image }}" class="img-fluid"
                                    alt="image"></a>
                            <div class="portfolio-info">
                                <h4><a href="products/show?{{ $product->id }}"
                                        title="More Details">{{ $product->name }}</a></h4>
                                <p>{{ __('RM') }} {{ $product->price }}</p>
                                <p>{{ $product->description }}</p>
                                <button type="button" class="btn btn-light btn-rounded float-end active"><i
                                        class="bi bi-heart" style="color:red"></i></button>
                            </div>
                        @endforeach
                    </div>
                </div><!-- End product Item -->

            </div>
        </div><!-- End Product -->
        <section id="blog" class="blog">
            <div class="blog-pagination">
                <ul class="justify-content-center">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>
            </div><!-- End Product -->

        </section><!-- End Product -->
    </div>
    </section><!-- End product Section -->
    </div>
@endsection
