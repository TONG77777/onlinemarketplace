@extends('layouts.admin_layout')

@section('content')
    <div class="container" data-aos="fade-up" style="height: 530px;">
        <br>
        <br>
        <div class="card-body">
            <h5 class="card-title">Order Details</h5>
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">

                <div class="input-group mb-3 mx-auto" style="width: 750px">
                    <input type="text" class="form-control" placeholder="Search Order Id...">
                    <div class="input-group-append">
                        <button class="btn btn-submit-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </div>

                </div>
            </div>
            <div class="dataTable-container">
                <table class="table " >
                    <thead>
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col" >User Id</th>
                            <th scope="col" >Product</a></th>
                            <th scope="col" >Status</a></th>
                            <th scope="col" >Price</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><a href="#">#2457</a></th>
                            <td>Brandon Jacob</td>
                            <td><a href="#" class="text-primary">At praesentium minu</a></td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td>$64</td>
                            
                        </tr>
                        <tr>
                            <th scope="row"><a href="#">#2147</a></th>
                            <td>Bridie Kessler</td>
                            <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                            
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>$47</td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="#">#2049</a></th>
                            <td>Ashleigh Langosh</td>
                            <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                            
                            <td><span class="badge bg-success">Approved</span></td>
                            <td>$147</td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="#">#2644</a></th>
                            <td>Angus Grady</td>
                            <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                            
                            <td><span class="badge bg-danger">Rejected</span></td>
                            <td>$67</td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="#">#2644</a></th>
                            <td>Raheem Lehner</td>
                            <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                            
                            <td><span class="badge bg-success">Approved</span></td>
                            <td>$165</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
@endsection
