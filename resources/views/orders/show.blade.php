@extends('layouts.layout')

@section('content')
    <section class="h-100 gradient-custom">
        <div class="container pt-5 my-5">
            <div class="card" style="border-radius: 10px;">
                <div class="card-header pt-2 my-2">
                    <h5 class="text-muted mb-0">Order History</h5>

                </div>


                <div class="card-body p-4">
                    <div class="card shadow-0 border mb-4">
                        <div class="card-body">
                            <div class="row">
                                @php
                                    $products = App\Models\Product::all();
                                    $orders = App\Models\Order::find($order->id);
                                    $images = App\Models\Image::all();
                                    $addresses = App\Models\Address::all();
                                @endphp
                                <div class="row">
                                    @foreach ($products as $product)
                                        @if ($order->product_id == $product->id)
                                            @foreach ($images as $image)
                                                @if ($loop->first)
                                                    <div class="col-md-2">
                                                        <img src="/img/products/{{ $image->url }}" class="img-fluid"
                                                            alt="image"
                                                            style="width:200px;min-height:200px; max-height:200px;">

                                                    </div>
                                                @endif
                                            @endforeach
                                            <div
                                                class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">{{ $product->name }}</p>
                                            </div>
                                            @php
                                                $category = App\Models\Category::find($product->category_id);
                                            @endphp

                                            @foreach ($categories as $category)
                                                @if ($product->category == $category->id)
                                                    <div
                                                        class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p class="text-muted mb-0 small">{{ $category->name }}</p>
                                                    </div>
                                                @endif
                                            @endforeach

                                            <div
                                                class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{ $product->condition }}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{ __('RM ') }}{{ $product->price }}
                                                </p>
                                            </div>

                                </div>
                                @endif
                                @endforeach
                            </div>
                            <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">

                            <div class="row d-flex align-items-center">
                                <div class="col-md-12">
                                    <div class="progress" style="height: 6px; border-radius: 16px;">

                                        @if ($order->status == 'cancelled')
                                            <div class="progress-bar" role="progressbar"
                                                style="width: 100%; border-radius: 16px; background-color: red;"
                                                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                    </div>
                                    <div class="d-flex justify-content-around mb-1">
                                        <h5>The order has already been canceled. </h5>
                                    </div>
                                @else
                                    @if ($order->status == 'pending')
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 25%; border-radius: 16px; background-color: #00b6a1;"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    @elseif($order->status == 'confirmed')
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 50%; border-radius: 16px; background-color: #00b6a1;"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    @elseif($order->status == 'shipping')
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 75%; border-radius: 16px; background-color: #00b6a1;"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    @elseif($order->status == 'completed')
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 100%; border-radius: 16px; background-color: #00b6a1;"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    @endif

                                </div>
                                {{-- pending, confirmed, shipping, completed, cancelled --}}
                                <div class="d-flex justify-content-around mb-1">
                                    <p class="text-muted mb-0 small">Order Created</p>
                                    <p class="text-muted mb-0 small">Order Confirmed</p>
                                    <p class="text-muted mb-0 small">Out for delivary</p>
                                    <p class="text-muted mb-0 small">Order Completed</p>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne"> <button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="false" aria-controls="collapseOne">Shipping Address</button></h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">

                                    @foreach ($addresses as $address)
                                        @if ($order->id == $address->id)
                                            Receiver Name: {{ $address->receiver_name }}
                                            <br>
                                            Receiver Contact : {{ $address->receiver_contact }}
                                            <hr>
                                            <strong>{{ $address->title }}</strong>
                                            <br>
                                            <p>Address : {{ $address->address }}
                                                <br>{{ $address->city }}, {{ $address->state }},
                                                {{ $address->postal_code }}.
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo"> <button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">Payment method</button></h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    @foreach ($payment as $payment)
                                        {{ __('Paid Date : ') }}{{ $payment->updated_at }}
                                        @if ($order->id == $payment->id)
                                            <br>
                                            <p>{{ __('Status : ') }} "{{ $payment->status }}"</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $total = 0;
                    $total = $order->amount_to_pay + $order->shipping_fee;
                    
                @endphp
                <div class="d-flex justify-content-between pt-2">
                    <p class="fw-bold mb-0">Order Details</p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> RM {{ $total }}</p>
                </div>

                <div class="d-flex justify-content-between pt-2">
                    <p class="text-muted mb-0">Order Id :</p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4"></span> # {{ $order->id }}</p>
                </div>
                @if ($order->status == 'cancelled')
                    <div class="d-flex justify-content-between">
                        <p class="text-muted mb-0">Cancel At : </p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4"></span> {{ $order->updated_at }}</p>
                    </div>
                @else
                    <div class="d-flex justify-content-between">
                        <p class="text-muted mb-0">Invoice Date : </p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4"></span> {{ $order->created_at }}</p>
                    </div>
                @endif
                <div class="d-flex justify-content-between mb-5">
                    <p class="text-muted mb-0">Delivery Fee :</p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4"></span> RM {{ $order->shipping_fee }}</p>
                </div>

                @if ($order->status != 'cancelled')
                    <form action="{{ route('order.cancel', $order->id) }}" method="PUT">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between pt-2">

                            <p class="text-muted mb-0"></p>
                            <p class="text-muted mb-0"><span class="fw-bold me-4"></span> <button type="submit"
                                    class="btn float-right" style="background-color: #f85a40; color:aliceblue; ">Cancel
                                    order</button></p>
                        </div>
                    </form>
                @endif





            </div>
            <div class="card-footer border-0 pt-3 py-3"
                style="table-active; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">

                <h5 class="d-flex align-items-center justify-content-end text-uppercase mb-0">
                    Total
                    paid: <span class="h2 mb-0 ms-2">RM {{ $total }}</span></h5>
            </div>

        </div>
        </div>
    </section>
@endsection
