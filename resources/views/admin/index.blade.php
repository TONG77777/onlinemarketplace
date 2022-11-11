@extends('layouts.admin_layout')

@section('content')
        <section id="services" class="services sections-bg">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Services</h2>
                    <p></p>
                </div>
                <div class="row gy-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item position-relative">
                            <div class="icon"> <i class="bi bi-activity"></i></div>
                            <h3>Category</h3>
                            <p>Management of the category detail.</p> <a href="/admin/category"
                                class="readmore stretched-link">Details <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item position-relative">
                            <div class="icon"> <i class="bi bi-broadcast"></i></div>
                            <h3>Order</h3>
                            <p>Update the Order status</p> <a href="/admin/order" class="readmore stretched-link">Details <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item position-relative">
                            <div class="icon"> <i class="bi bi-easel"></i></div>
                            <h3>Report</h3>
                            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas
                                adipisci eos earum corrupti.</p> <a href="#" class="readmore stretched-link">Read more
                                <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

@endsection
