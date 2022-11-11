@extends('layouts.admin_layout')

@section('content')
    <section class="section" >
        <div class="row justify-content-center" >

            <div class="col-lg-6">

                <div class="card" style="height:350px">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <h5 class="card-title">Edit Category Details</h5>

                        <!-- Category Details Form -->
                        <form class="row g-3" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-12">
                                <label for="" class="form-label">Edit Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $category->name }}" required
                                    placeholder="Category Name">
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Edit Description</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Description for the category..." id="description" style="height: 100px;"
                                        name="description" required>{{ old('name') ?? $category->description }}</textarea>
                                    <label for="floatingTextarea">Description for the Category</label>
                                </div>
                            </div>

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-submit">Submit</button>
                        <button type="reset" class="btn btn-reset">Reset</button>
                    </div>
                    </form><!-- Category Details Form -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
