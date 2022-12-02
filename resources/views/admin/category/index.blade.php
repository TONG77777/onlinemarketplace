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
                    <li>{{ __('Category List') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <div class="container pt-5 my-5" style="height: auto">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <button type="submit" class="float-end btn" style="background: #00b6a1"><a href="/admin/category/create"
                style="color: azure">{{ __('+ Add New Category') }}</a></button>
        <h2 class="mb-5">{{ __('Category List') }}</h2>
        <hr>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('#ID') }}</th>
                    <th>{{ __('Category Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Updated At') }}</th>
                    <th>{{ __('Edit') }}</th>
                    <th>{{ __('Delete') }}</th>
                </tr>
                <thead>

                </thead>
            <tbody>
                <tr>
                    @foreach ($category as $category)
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td><a href="{{ route('admin.category.edit', $category->id) }}">{{ __('Edit') }}</a></td>
                        <td>
                            <form action="/admin/category/{{ $category->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        </td>
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
