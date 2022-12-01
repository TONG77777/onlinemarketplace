@extends('layouts.admin_layout')

@section('content')
    <div class="container" data-aos="fade-up" style="height:auto; min-height:500px;">
        <br>
        <br>
        <div class="card-body">
            <h5 class="card-title">Report</h5>
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| Category</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-tags-fill"></i>

                                <div class="ps-3">
                                    <h6>145</h6> 
                                    <span class="text-success small pt-1 fw-bold">View Details</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| Products</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-bag-fill"></i>

                                <div class="ps-3">
                                    <h6>145</h6> 
                                    <span class="text-success small pt-1 fw-bold">View Details</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| User</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-people-fill"></i>

                                <div class="ps-3">
                                    <h6>145</h6> 
                                    <span class="text-success small pt-1 fw-bold">View Details</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| Order</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-person-fill"></i>

                                <div class="ps-3">
                                    <h6>145</h6> 
                                    <span class="text-success small pt-1 fw-bold">View Details</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
