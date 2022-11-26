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
                                <div class="col-md-2">
                                    <img src="img"
                                        class="img-fluid" alt="Phone">
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0">Product Name</p>
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small">Category</p>
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small">Condition: Like New</p>
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="text-muted mb-0 small">RM 499</p>
                                </div>
                            </div>
                            <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                            
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
                                    Receiver Name: XXXXXXXX
                                    <br>
                                    Receiver Contact : 01X-XXXXXXXX
                                    <hr>
                                    <strong>Title</strong> 
                                    <br>
                                    <p>Address : No.45, Jalan Setia Jaya, Jalan Murah Setia, 85000, Kuala Lumpur, Selangor.</p>
                                    
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
                                    Debit Card
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                        <p class="fw-bold mb-0">Order Details</p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> RM XX.XX</p>
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                        <p class="text-muted mb-0">Order Id :</p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4"></span> # 1</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="text-muted mb-0">Invoice Date : </p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4"></span> 22 Dec 2019</p>
                    </div>

                    <div class="d-flex justify-content-between mb-5">
                        <p class="text-muted mb-0">Delivery Fee :</p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4"></span> RM 3.99</p>
                    </div>
                </div>
                <div class="card-footer border-0 pt-3 py-3"
                    style="table-active; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <h5 class="d-flex align-items-center justify-content-end text-uppercase mb-0">Total
                        paid: <span class="h2 mb-0 ms-2">$1040</span></h5>
                </div>

            </div>
        </div>
    </section>
@endsection
