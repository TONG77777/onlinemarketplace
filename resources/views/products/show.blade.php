@extends('layouts.layout')

@section('content')
    <main id="main">

        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            
                            <h2>{{__('Product Details')}}</h2>
                            <p>{{__('Some description about the product')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li>{{__('Product Desciption')}}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container" data-aos="fade-up">
                <div class="mx-auto" style="width: 400px">
                    <div class="card-body">

                        <!-- Slides with controls -->
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="/img/products/{{$product->image}}" class="d-block w-100" alt="image1">
                              </div>
                              <div class="carousel-item">
                                <img src="/img/products/{{$product->image}}" class="d-block w-100" alt="image2">
                              </div>
                              <div class="carousel-item">
                                <img src="/img/products/{{$product->image}}" class="d-block w-100" alt="image3">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                        
                    </div>
                    
                </div>
                

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <h2>{{$product->name}}</h2>
                            <h3>{{__('RM')}} {{$product->price}}</h3>
                            <p>
                                {{__('Posted :')}} {{$product->created_at->format('d M Y')}}
                            </p>
                            <P>
                                {{__('Category  :')}} {{$product->category}}
                            </P>
                            <P>
                                {{__('Condition  :')}} {{$product->condition}}
                            </P>

                            </p>
                            <h4>{{__('Description :')}} </h4>
                            <p>
                                 {{$product->description}}
                            </p>

                            <div class="testimonial-item">
                                <div>
                                    <img src="/img/p1.png" class="testimonial-img" alt="">
                                    <h3>{{__('User Name')}}</h3>
                                    <h4>{{Auth::user()->name}}</h4>
                                </div>
                            </div>

                            <h3>{{__('Delivery  :')}}</h3>
                            <p>{{__('Option 1')}}</p>
                            <p>{{__('Option 2')}}</p>
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>{{__('Product Infromation')}}</h3>
                            <ul>
                                <li><strong>{{__('Category')}}</strong> <span>{{$product->category}}</span></li>
                                <li><strong>{{__('Publish Date')}}</strong> <span>{{$product->created_at->format('d M Y')}}</span></li>
                                <li><a href="#" class="btn-contact"> {{__('Contact ')}}<i class="bi bi-person-lines-fill"></i></a></li>
                                <li><a href="#" class="btn-buy"> {{__('Buy Now ')}}<i class="bi bi-cart-check-fill"></i></a></li>
                                {{-- <ul> 
                                    <u><li><a href="{{route('seller.products.edit', $product->id)}}" class="btn-"> Edit Product <i class="bi bi-pencil-square"></i></a></li></u>
                                    <u><li><a href="#" class="btn-"> Mask as Sold <i class="bi bi-check-square-fill"></i></a></li></u>
                                    <u><li>
                                    <form action="/products/{{$product->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button><i class="bi bi-trash-fill" style="color:red">Delete Product </i></button>
                                    </form>
                                </li></u>
                                </ul> --}}
                            </ul>
                        </div>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
@endsection
{{-- @section('script')
$(document).ready(function() {
    var i = 0;    
  $('.add-new-product').on('click', function() {

    // here just clone the product when chick on (.add-new-product) button
    // every thing is fine with clone 

    var $clone = $('#new-product-content > div').clone();
    $clone.appendTo('#products-div');

      i++;  
      // here I try to put id in each product
      $('#new-product-content > div').attr('id', 'row'+ i);

      // here to put id in 
      $('.delete-product > a').attr('id',i);

    });

  });  
@endsection --}}