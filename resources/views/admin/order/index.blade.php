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

                </form>
                <form action="{{ route('admin.order.status') }}" method="GET">
            </div>
            @csrf
            <select class="form-select" aria-label="Default select example" name="status" id="status">
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="shipping">Shipping</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-submit-secondary" type="submit"><i class="bi bi-filter"></i></button>
            </div>
            </form>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
    </div>
    <div class="dataTable-top">
        <div class="dataTable-dropdown"><label>
                <select class="dataTable-selector" name="number">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
            </label></div>
           


        <div class="dataTable-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ordered By</th>
                        <th scope="col">Ordered Date</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
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

                            <td>{{ $or->created_at }}</td>

                            @foreach ($products as $product)
                                @if ($product->id == $or->product_id)
                                    <td>
                                        <p style="color: #008374">{{ $product->name }}</p>
                                    </td>
                                @endif
                            @endforeach
                            {{-- //pending, confirmed, shipping, completed, cancelled --}}
                            @if ($or->status == 'pending')
                                <td><span class="badge bg-warning text-dark">{{ $or->status }}</span></td>
                            @elseif($or->status == 'cancelled')
                                <td><span class="badge bg-danger">{{ $or->status }}</span></td>
                            @elseif($or->status == 'completed')
                                <td><span class="badge bg-success">{{ $or->status }}</span></td>
                            @elseif($or->status == 'shipping')
                                <td><span class="badge bg-info">{{ $or->status }}</span></td>
                            @elseif($or->status == 'confirmed')
                                <td><span class="badge bg-primary">{{ $or->status }}</span></td>
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
                    {{$orders->links()}}
                </ul>
            </div><!-- End Product -->

        </section><!-- End Product -->

    </div>
    </div>
    </div>
@endsection
