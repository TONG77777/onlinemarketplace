@extends('layouts.layout')

@section('content')

    <section class="section">
        <div class="row justify-content-center">

            <div class="col-lg-6" >

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Product Details</h5>

                        <!-- Edit Details Form -->
                        <form class="row g-3" action="{{route('seller.products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-12">
                                <label for="prodName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="">
                            </div>

                            <div class="col-12">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Condition</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" name="condition">
                                            <option value="Never Used">Never Used</option>
                                            <option value="Like New">Like New</option>
                                            <option value="Lightly Used">Lightly Used</option>
                                            <option value="Well Used">Well Used</option>
                                            <option value="Heavily Used">Heavily Used</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-valuetext="" aria-label="Default select example" name="category">
                                            <option value="1">Computer & Technology</option>
                                            <option value="2">Furniture</option>
                                            <option value="3">Home & Living</option>
                                            <option value="4">Hobbies</option>
                                            <option value="5">Sport Equipment</option>
                                            <option value="6">Book & Article</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input type="number" min="1" class="form-control" value="" name="price">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="description">{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                
                                <button type="submit" class="btn btn-submit">Submit</button>
                    
                                <button type="reset" class="btn btn-reset">Reset</button>
                            </div>
                        </form><!-- Product Details Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
