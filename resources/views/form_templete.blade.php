@extends('layouts.layout')

@section('content')
<section class="section">
    <div class="row justify-content-center">
  
      <div class="col-lg-6">
  
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product Details</h5>
  
            <!-- Vertical Form -->
            <form class="row g-3">
              <div class="col-12">
                <label for="prodName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name">
              </div>

              <div class="col-12">
                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                <div class="col-sm-12">
                  <input class="form-control" type="file" id="formFile">
                </div>
              </div>

              <div class="col-12">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Condition</label>
                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example">
                        <option value="1">Never Used</option>
                        <option value="2">Like New</option>
                        <option value="3">Lightly Used</option>
                        <option value="4">Well Used</option>
                        <option value="5">Heavily Used</option>
                      </select>
                    </div>
                  </div>
              </div>

              <div class="col-12">
              <label for="price" class="form-label">Price</label>
              <div class="input-group mb-3">
                <span class="input-group-text">RM</span>
                <input type="number" min="1" class="form-control" >
              </div>
              </div>

              <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                  <label for="floatingTextarea">Description for the product</label>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-submit">Submit</button>
                <button type="reset" class="btn btn-reset">Reset</button>
              </div>
            </form><!-- Vertical Form -->
  
          </div>
        </div>
  
      </div>
    </div>
  </section>
@endsection