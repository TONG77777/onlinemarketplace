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
                    <li>{{ __('Admin List') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <div class="container pt-5 my-5" style="height: auto">
        <h2 class="mb-5">{{ __('Admin List') }}</h2>
        <hr>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('#Admin ID') }}</th>
                    <th>{{ __('Admin Name') }}</th>
                    <th>{{ __('Admin Email') }}</th>
                    <th>{{ __('Created At') }}</th>
                </tr>
                <thead>

                </thead>
            <tbody>
                <tr>
                    @foreach ($admins as $admin)
                    <td>{{$admin->id}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->created_at}}</td>
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
