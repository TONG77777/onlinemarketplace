@extends('layouts.layout')
@section('content')
    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li>{{ __('Your Wishlist') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    

    <div class="container pt-5 my-5" style="height:400px;">
        @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('Image') }}</th>
                    <th scope="col">{{ __('Product') }}</th>
                    <th scope="col">{{ __('Price') }}</th>
                    <th scope="col">{{ __('Condition') }}</th>
                    <th scope="col">{{ __('Buy Now') }}</th>
                    <th scope="col">{{ __('Remove') }}</th>
                </tr>
            </thead>
            <tbody>
               
               @if($wishlist->count() > 0)
        
                @foreach ($wishlist as $wish)
                <tr>
                    <th scope="row"><a href="products/{{ $wish->product_id }}"><img
                                src="img/products/{{ $wish->product->image }}" style="width:60px;height:60px;"
                                alt=""></a></th>
                    <div class="portfolio-info">
                        <td><a href="products/{{ $wish->product_id }}" class="">{{ $wish
                                ->product->name }}</a></td>
                    </div>
                    <td>{{ __('RM') }} {{ $wish->product->price }}</td>
                    <td scope="row">{{ $wish->product->condition }}</td>
                    <td>
                        <form action="">
                        @csrf
                        <input type="hidden" name="id" value="{{ $wish->product->id }}">
                        <input type="hidden" name="name" value="{{ $wish->product->name }}">
                        <button type="submit" class="btn" style="background: #00b6a1;color:azure"><i class="bi bi-bag-fill"></i></button>
                        </form>
                    </td>

                    </td>
                    <td>
                        <form action="{{ route('wishlist.destroy', $wish->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center">{{ __('No Wishlist') }}</td>
                </tr>
                @endif
            </tbody>

               
        </table>
    </div>
@endsection
{{-- 
                    @foreach ($products as $product)
                    
                        <th scope="row"><a href="products/{{ $product->id }}"><img
                                    src="img/products/{{ $product->image }}" style="width:150px;height:150px;"
                                    alt=""></a></th>
                        <div class="portfolio-info">
                            <td><a href="products/{{ $product->id }}" class="">{{ $product->name }}</a></td>
                        </div>
                        <td>{{ __('RM') }} {{ $product->price }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>
                            @foreach ($categories as $category)
                                @if ($category->id == $product->category)
                                    {{ $category->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-link"><i
                                        class="bi bi-trash-fill" style="color:red"></i></button>
                            </form>
                        </td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}