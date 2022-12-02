@extends('layouts.admin_layout')
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

<script type="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
@section('content')
    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/admin/">{{ __('Home') }}</a></li>
                    <li>{{ __('Payment List') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <div class="container pt-5 my-5" style="height: auto">
        <h2 class="mb-5">{{ __('Payment List') }}</h2>
        <hr>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('# Payment ID') }}</th>
                    <th>{{ __('Amount') }}</th>
                    <th>{{ __('# Order ID') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Updated Date') }}</th>
                </tr>
                <thead>

                </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->order_id }}</td>
                        {{-- //success, failed, pending(default) --}}
                        @if ($payment->status == 'pending')
                            <td><span class="badge bg-warning text-dark">{{ __('Pending') }}</span></td>
                        @elseif($payment->status == 'success')
                            <td><span class="badge bg-success text-light">{{ __('Success') }}</span></td>
                        @else
                            <td><span class="badge bg-danger text-light">{{ __('Failed') }}</span></td>
                        @endif

                        <td>{{ $payment->updated_at }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
