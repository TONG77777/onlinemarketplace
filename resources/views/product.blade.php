@extends('layouts.layout')

@section('content')
    {{-- <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar --> --}}
    <div class="container" data-aos="fade-up">
        <!-- ======= product Section ======= -->

        <div class="section-header">
            <h2>Used Item</h2>
            <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia
                reprehenderit sunt deleniti</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">


            <div class="row gy-4 portfolio-container">

                <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <a href="" data-gallery="portfolio-gallery-app" class="glightbox"><img src="img/p1.png"
                                class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="/detail" title="More Details">Product Name</a></h4>
                            <p>RM 100</p>
                            <button type="button" class="btn btn-light"><i class="bi bi-heart"
                                    style="color:red"></i></button>
                        </div>
                    </div>
                </div><!-- End product Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                    <div class="portfolio-wrap">
                        <a href="assets/img/portfolio/product-1.jpg" data-gallery="portfolio-gallery-app"
                            class="glightbox"><img src="assets/img/portfolio/product-1.jpg" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Product 1</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End product Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                    <div class="portfolio-wrap">
                        <a href="assets/img/portfolio/branding-1.jpg" data-gallery="portfolio-gallery-app"
                            class="glightbox"><img src="assets/img/portfolio/branding-1.jpg" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Branding 1</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End product Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                    <div class="portfolio-wrap">
                        <a href="assets/img/portfolio/books-1.jpg" data-gallery="portfolio-gallery-app"
                            class="glightbox"><img src="assets/img/portfolio/books-1.jpg" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Books 1</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End product Item -->

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
