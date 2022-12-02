@extends('layouts.layout')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Welcome to <span>Online Marketplace to sell and buy Used Item</span></h2>
                    <p>This online marketplace is to avoid wasting materials and use the way of buying and selling to let
                        people put their Used Item to sell.</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="/products/create" class="btn-get-seller">SELLER</a>
                        <a href="/products" class="btn-get-buyer">BUYER</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="/img/p1.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
