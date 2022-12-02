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
                    <li>{{ __('Products List') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <div class="container pt-5 my-5" style="height: auto">
        <h2 class="mb-5">{{ __('Products List') }}</h2>
        <hr>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('#Products ID') }}</th>
                    <th>{{ __('Product Name') }}</th>
                    <th>{{ __('Condition') }}</th>
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Price') }}</th> 
                    <th>{{ __('Updated At') }}</th>
                    <th>{{ __('Created By') }}</th>
                </tr>
                <thead>

                </thead>
            <tbody>
              
                    @foreach ($products as $product)
                        
                    <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->condition}}</td>
                    <td>{{$product->categories->name}}</td>
                    <td>RM {{$product->price}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>{{$product->user->name}}</td>
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
