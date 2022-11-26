@extends('layouts.admin_layout')

@section('content')
    <div class="container" data-aos="fade-up" style="height:auto">
        <br>
        <br>
        <div class="card-body">
            <h5 class="card-title">Order Details</h5>
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <form action="{{ route('admin.order.search') }}" method="GET">
                    @csrf
                    <div class="input-group mb-3 mx-auto" style="width: 750px">

                        <input type="text" class="form-control" placeholder="Search Order Id" name="query">
                        <div class="input-group-append">
                            <button class="btn btn-submit-secondary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                </form>

            </div>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="dataTable-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Product</a></th>
                        <th scope="col">Status</a></th>
                        <th scope="col">Price</a></th>
                        <th scope="col">Action</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>


                        @foreach ($orders as $or)
                            <th scope="row"><a href="#">#{{ $or->id }}</a></th>

                            @foreach ($users as $user)
                                @if ($user->id == $or->user_id)
                                    <td>{{ $user->name }}</td>
                                @endif
                            @endforeach

                            @foreach ($products as $product)
                                @if ($product->id == $or->product_id)
                                    <td><a href="#" class="text-primary">{{ $product->name }}</td>
                                @endif
                            @endforeach

                            @if ($or->status == 'pending')
                                <td><span class="badge bg-warning text-dark">{{ $or->status }}</span></td>
                            @elseif($or->status == 'cancelled')
                                <td><span class="badge bg-danger">{{ $or->status }}</span></td>
                            @elseif($or->status == 'completed')
                                <td><span class="badge bg-success">{{ $or->status }}</span></td>
                            @endif


                            <td> RM {{ $total = $or->amount_to_pay + $or->shipping_fee }}</td>
                            <form action="{{ route('admin.order.update', $or->id) }}" method="PUT">
                                @csrf
                                @method('PUT')
                                <td>
                                    <button type="submit" class="btn btn-primary">Complete</button>
                                <td>
                            </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <section id="blog" class="blog">
            <div class="blog-pagination">
                <ul class="justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div><!-- End Product -->

        </section><!-- End Product -->

    </div>
    </div>
    </div>
@endsection
