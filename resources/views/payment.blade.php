@extends('layouts.layout')

@section('content')
    <!-- Credit card form -->
    <div class="container">
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
            <section>
                <div class="row">
                    <div class="col-md-8 mb-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Address details</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">{{ __('Receiver Name') }}</label>
                                                <input type="text" id="form6Example1" class="form-control"
                                                    placeholder="Full Name" />

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">

                                                <label class="form-label" for="form6Example2">{{ __('Label') }}</label>
                                                <input type="text" id="form6Example2" class="form-control"
                                                    placeholder="Company Name/Home" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">{{ __('Email Address') }}</label>
                                                <input type="text" id="form6Example1" class="form-control"
                                                    placeholder="exmaple@gmail.com" />

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">

                                                <label class="form-label" for="form6Example2">{{ __('Contact Number') }}</label>
                                                <input type="text" id="form6Example2" class="form-control"
                                                    placeholder="01X-XXXXXXXX" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <div class="form-outline">

                                                <label class="form-label" for="formExpiration">{{ __('City') }}</label>
                                                <input type="text" id="formExpiration" class="form-control"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        {{ __(' / ') }}
                                        <div class="col-3">
                                            <div class="form-outline">

                                                <label class="form-label" for="formCVV">{{ __('State') }}</label>
                                                <input type="text" id="formCVV" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">

                                                <label class="form-label"
                                                    for="formCardNumber">{{ __('Postal Code') }}</label>
                                                <input type="text" id="formCardNumber" class="form-control"
                                                    placeholder="XXXXX" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="checkoutForm2"
                                            checked />
                                        <label class="form-check-label" for="checkoutForm2">
                                            Save this information for next time
                                        </label>
                                    </div>

                                    <h5 class="mb-4">{{ __('Card Details') }}</h5>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="formNameOnCard">{{ __('Full Name') }}</label>
                                                <input type="text" id="formNameOnCard" class="form-control"
                                                    placeholder="Name" />

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">

                                                <label class="form-label"
                                                    for="formCardNumber">{{ __('Credit card number') }}</label>
                                                <input type="text" id="formCardNumber" class="form-control"
                                                    placeholder="XXXX-XXXX-XXXX-XXXX" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <div class="form-outline">

                                                <label class="form-label" for="formExpiration">{{ __('MM') }}</label>
                                                <input type="text" id="formExpiration" class="form-control"
                                                    placeholder="XX" />
                                            </div>
                                        </div>
                                        {{ __(' / ') }}
                                        <div class="col-3">
                                            <div class="form-outline">

                                                <label class="form-label" for="formCVV">{{ __('YY') }}</label>
                                                <input type="text" id="formCVV" class="form-control"
                                                    placeholder="XX" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">

                                                <label class="form-label"
                                                    for="formCardNumber">{{ __('CVV') }}</label>
                                                <input type="text" id="formCardNumber" class="form-control"
                                                    placeholder="XXX" />
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-login btn-lg btn-block" type="submit">
                                        {{ __('Continue to checkout') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">{{ __('Order Summary') }}</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        {{ __('Products') }}
                                        <span>{{ __('RM XX.XX') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        {{ __('Shipping fees') }}
                                        <span>{{ __('RM XX.XX') }}</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>{{ __('Total amount') }}</strong>
                                        </div>
                                        <span><strong>{{ __('RM XX.XX') }}</strong></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Credit card form -->
        </div>
    </div>
@endsection
