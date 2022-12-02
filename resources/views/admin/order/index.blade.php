@extends('layouts.admin_layout')

@section('content')
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

    <script type="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>

    <div class="container" data-aos="fade-up" style="height:auto; min-height:700px;">
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
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Order By</th>
                <th>Order Date</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total=0; @endphp
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->product->name }}</td>
                    {{-- //pending, confirmed, shipping, completed, cancelled --}}
                    @if ($order->status == 'pending')
                        <td><span class="badge bg-warning text-dark">{{ $order->status }}</span></td>
                    @elseif($order->status == 'cancelled')
                        <td><span class="badge bg-danger">{{ $order->status }}</span></td>
                    @elseif($order->status == 'completed')
                        <td><span class="badge bg-success">{{ $order->status }}</span></td>
                    @elseif($order->status == 'shipping')
                        <td><span class="badge bg-info">{{ $order->status }}</span></td>
                    @elseif($order->status == 'confirmed')
                        <td><span class="badge bg-primary">{{ $order->status }}</span></td>
                    @endif
                    <td>RM {{ $total = $order->amount_to_pay + $order->shipping_fee }}</td>
                    <td><a href="{{ route('admin.order.update', $order->id) }}">Complte</a></td>
                </tr>
            @endforeach

            </tfoot>
    </table>

    </div>

    </div>
    </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
