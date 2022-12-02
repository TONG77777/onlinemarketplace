@extends('layouts.admin_layout')
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

<script type="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
@section('content')
    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('admin.index') }}">{{ __('Home') }}</a></li>
                    <li>{{ __('Payments') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <div class="container" data-aos="fade-up" style="height:auto; min-height:700px;">
        <br>
        <br>
        <div class="card-body">
            <h5 class="card-title">Payments List</h5>
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

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#Payment Id</th>
                    <th>Paid Date</th>
                    <th>#Order Id</th>
                    <th>Status</th>
                    <th>Total Amount</th>

                </tr>
            </thead>
            <tbody>
                @php $total=0; @endphp
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->created_at }}</td>
                        <td>{{ $payment->order_id }}</td>
                        {{-- //success, failed, pending(default) --}}
                        @if ($payment->status == 'success')
                            <td><span class="badge bg-success">{{ $payment->status }}</span></td>
                        @elseif($payment->status == 'failed')
                            <td><span class="badge bg-danger">{{ $payment->status }}</span></td>
                        @elseif($payment->status == 'pending')
                            <td><span class="badge bg-warning">{{ $payment->status }}</span></td>
                        @endif
                        <td>RM {{ $payment->amount }}</td>
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
