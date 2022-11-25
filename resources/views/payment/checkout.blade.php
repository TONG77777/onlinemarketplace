@extends('layouts.layout')

@section('content')
    <!-- Credit card form -->
    <div class="container">
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
            <section>
                <div class="row">
                    <h4>Checkout Pages</h4>
                    <div class="col-md-8 mb-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Address details</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('place.order') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label"
                                                    for="form6Example1">{{ __('Receiver Name') }}</label>
                                                <input type="text" id="form6Example1" class="form-control"
                                                    placeholder="Full Name" name="receiver_name" />

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">

                                                <label class="form-label" for="form6Example2">{{ __('Label') }}</label>
                                                <input type="text" id="form6Example2" class="form-control"
                                                    placeholder="Company Name/Home" name="title" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label"
                                                    for="form6Example1">{{ __('Email Address') }}</label>
                                                <input type="text" id="form6Example1" class="form-control"
                                                    placeholder="exmaple@gmail.com" name="email" />

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">

                                                <label class="form-label"
                                                    for="form6Example2">{{ __('Contact Number') }}</label>
                                                <input type="text" id="form6Example2" class="form-control"
                                                    placeholder="01X-XXXXXXXX" name="receiver_contact" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Description for the product..." id="description" style="height: 100px;"
                                                        name="address"></textarea>
                                                    <label for="floatingTextarea"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <div class="form-outline">

                                                <label class="form-label" for="formExpiration">{{ __('City') }}</label>
                                                <input type="text" id="formExpiration" class="form-control"
                                                    placeholder="" name="city" />
                                            </div>
                                        </div>
                                        {{ __(' / ') }}
                                        <div class="col-3">
                                            <div class="form-outline">

                                                <label class="form-label" for="formCVV">{{ __('State') }}</label>
                                                <input type="text" id="formCVV" class="form-control" placeholder=""
                                                    name="state" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">

                                                <label class="form-label"
                                                    for="formCardNumber">{{ __('Postal Code') }}</label>
                                                <input type="text" id="formCardNumber" class="form-control"
                                                    name="postal_code" placeholder="XXXXX" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">{{ __('Order Summary') }}</h5>
                            </div>
                            @php $total = 0; @endphp
                            <div class="card-body">
                                @php
                                    $shipping_fee = 3.99;
                                    $total += $shipping_fee + $product->price;
                                    
                                @endphp
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        {{ __('Products') }}
                                        <span>{{ $product->price }}</span>
                                        <input type="hidden" name="amount_to_pay" value="{{ $product->price }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        {{ __('Shipping fees') }}
                                        <span>{{ $shipping_fee }}</span>
                                        <input type="hidden" name="shipping_fee" value="{{ $shipping_fee }}">
                                        <input type="hidden" name="status" value="pending">
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>{{ __('Total amount') }}</strong>
                                        </div>
                                        <span><strong>{{ __('RM') }} {{ $total }}</strong></span>

                                    </li>
                                </ul>


                                <button class="btn btn-login btn-lg btn-block float-end" type="submit"
                                    id="checkout-button">
                                    {{ __('Continue to proceed') }}
                                </button>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Credit card form -->
        </div>
    </div>
@endsection
