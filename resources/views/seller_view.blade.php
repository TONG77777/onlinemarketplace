@extends('layouts.layout')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Product Details</h2>
                            <p>Some description about the product</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Product Desciption</li>
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
                        <div id="carouselExampleControls" class="carousel slide pointer-event" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <img src="/img/p1.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/hero-bg-abstract.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item active">
                                    <img src="/img/p1.png" class="d-block w-100" alt="...">
                                </div>
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

                        </div><!-- End Slides with controls -->

                    </div>
                    {{-- <img src="/img/p1.png" alt=""> --}}
                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <h2>Product Name</h2>
                            <h3>RM 100</h3>
                            <p>
                                Posted : 12 Ogus 2022
                            </p>
                            <P>
                                Size : M
                            </P>
                            <P>
                                Condition : normal
                            </P>

                            </p>
                            <p>
                                khaki short pants
                            </p>

                            <div class="testimonial-item">
                                <div>
                                    <img src="/img/p1.png" class="testimonial-img" alt="">
                                    <h3>User Name</h3>
                                    <h4>Designer</h4>
                                </div>
                            </div>

                            <h3>Delivery</h3>
                            <p>Option 1</p>
                            <p>Option 1</p>
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-4" >
                        <div class="portfolio-info" style="background-color: #eee; weight: 200px ;height: 300px">
                            <div class="container pt-5 my-5" style="padding-left: 15%">
                            <h3>Product information</h3>
                            <ul>
                                <u><li><a href="#" class="btn-"> Edit Product <i class="bi bi-pencil-square"></i></a></li></u>
                                <u><li><a href="#" class="btn-"> Mask as Sold <i class="bi bi-check-square-fill"></i></a></li></u>
                                <u><li><a href="#" class="btn-"> Delete Product <i class="bi bi-trash-fill" style="color:red"></i></a></li></u>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
@endsection
