@extends('layouts.layout')

@section('content')
    <section class="section">
        <div class="row justify-content-center" style="height: 450px">

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body" >
                        <h5 class="card-title">Addresses Form</h5>

                        <!-- No Labels Form -->
                        <form class="row g-3">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="State">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="XXXXX" hint="">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-submit">Submit</button>
                                <button type="reset" class="btn btn-reset">Reset</button>
                            </div>
                        </form><!-- End No Labels Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
@endsection
