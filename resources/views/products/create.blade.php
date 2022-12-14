@extends('layouts.layout')

@section('content')
    <section class="section">
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <h5 class="card-title">Product Details</h5>

                        <!-- Product Details Form -->
                        <form class="row g-3" action="/products" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="prodName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    placeholder="Product Name">
                            </div>

                            <div class="col-12">
                                <label for="prodImage" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" id="image" name="image[]" multiple>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Condition</label>
                                    <div class="col-sm-12">
                                        <select id="condition" name="condition" class="form-select" required>
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
                                        <select id="category" name="category" class="form-select" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input type="number" name="price" min="1" class="form-control" id="price"
                                        required placeholder="XX.XX">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Description for the product..." id="description" style="height: 100px;"
                                        name="description" required></textarea>
                                    <label for="floatingTextarea">Description for the product</label>
                                </div>
                            </div>

                            {{-- <div class="col-12">
                                <label for="delivery_method" class="form-label">Delivery Method :</label>
                                <div class="col-sm-10">
                                    <div class="form-check"> <input class="form-check-input" type="checkbox"
                                            id="gridCheck1" checked=""> <label class="form-check-label" for="gridCheck1" > Delivery
                                        </label></div>
                                    <div class="form-check"> <input class="form-check-input" type="checkbox" id="gridCheck2"
                                            checked=""> <label class="form-check-label" for="gridCheck2"> Meet Up
                                        </label></div>
                                </div>
                                <div class="form-check"> <input class="form-check-input" type="checkbox" id="gridCheck2"
                                        checked=""> <label class="form-check-label" for="gridCheck2"> Cash On
                                        Delivery</label></div>
                            </div> --}}
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
