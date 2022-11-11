@extends('layouts.admin_layout')
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
    <div class="container pt-5 my-5" style="height: 450px">

        <button style="submit" class="float-end"><a
                href="/admin/category/create">{{ __('Add New Category') }}</a></button>
        <table class="table">

            <thead>
                <tr>
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('Category Name') }}</th>
                    <th scope="col">{{ __('Description') }}</th>
                    <th scope="col">{{ __('Updated At') }}</th>
                    <th scope="col">{{ __('Edit') }}</th>
                    <th scope="col">{{ __('Delete') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($category as $category)
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td scope="row">{{ $category->updated_at }}</td>
                        <td><a href="{{route('admin.category.edit',$category->id)}}">{{ __('Edit') }}</a></td>
                        <td>
                            <form action="/admin/category/{{ $category->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        <td>
                          
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
