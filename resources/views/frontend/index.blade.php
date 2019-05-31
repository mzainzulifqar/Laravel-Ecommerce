@extends('frontend.layouts.app')
@section('title')
<title>Best Price</title>
@endsection()

@section('section')
 
{{-- <div class="se-pre-con"></div> --}}
<div id="snackbar">@if(session()->has('message')){{session()->get('message')}}@endif</div>

  
   

        <!-- start section -->
        <section class="section light-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <div class="navbar-vertical">
                            <ul class="nav nav-stacked">
                                <li class="header">
                                    <h6 class="text-uppercase">Categories <i class="fa fa-navicon pull-right"></i></h6>
                                </li>
                             
                                   
                                    
                                        @foreach($category as $cat)
                                            
                                <li class="dropdown-submenu">
                                    <a href="{{route('main.shop',['category' =>$cat->slug ])}}" class="dropdown-toggle" >{{$cat->name}}<i class="fa fa-angle-right pull-right"></i></a>
                                     <ul class="dropdown-menu">
                                            @foreach($cat->children as $pp)
                                        <li><a href="{{route('main.shop',['category' =>$pp->slug ])}}">{{$pp->name}}</a></li>
                                        @endforeach()
                                    </ul>
                                    
                                   
                                
                                   
                                </li>
                          @endforeach
                                    

                                </li>
                            </ul>
                        </div><!-- end navbar-vertical -->
                    </div><!-- end col -->
                    <div class="col-sm-8 col-md-9">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="{{asset('public/theme/img/slider/slider_09.jpg')}}" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="{{asset('public/theme/img/slider/slider_09.jpg')}}" alt="Chicago">
    </div>

    <div class="item">
      <img src="{{asset('public/theme/img/slider/slider_08.jpg')}}" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        
        <!-- start section -->
        <section class="section white-background">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title"><span class="text-primary">Newest</span> Products</h2>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row column-4">
                    @foreach($product as $p)
                  

                      <!-- Modal Product Quick View -->
                <div class="modal fade productQuickView-{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5>{{$p->title}}</h5>
                            </div><!-- end modal-header -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                                            <div class='carousel-inner'>
                                                <div class='item active'>
                                                    <figure>
                                                        <img src='{{asset('public/images/'.$p->thumbnail)}}' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="{{asset('public/images/'.$p->thumbnail)}}"></iframe>
                                                    </div>
                                                </div><!-- end item -->
                                               
                                               
                                            </div><!-- end carousel-inner -->

                                           
                                        </div><!-- end carousel -->
                                    </div><!-- end col -->
                                    <div class="col-sm-7">
                                        <p class="text-gray alt-font">Product code: {{$p->id}}</p>

                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star-half-o text-warning"></i>
                                        <span>(12 reviews)</span>
                                        <h4 class="text-primary">${{$p->discount_price}}</h4>
                                        <p>{!! $p->description !!}</p>
                                        <hr class="spacer-10">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>Color</option>
                                                    <option value="red">Red</option>
                                                    <option value="green">Green</option>
                                                    <option value="blue">Blue</option>
                                                </select>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="">Size</option>
                                                    <option value="">S</option>
                                                    <option value="">M</option>
                                                    <option value="">L</option>
                                                    <option value="">XL</option>
                                                    <option value="">XXL</option>
                                                </select>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>QTY</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                    <option value="">7</option>
                                                </select>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                        <hr class="spacer-10">
                                        <ul class="list list-inline">
                                            <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Add to Cart</button></li>
                                            <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
                                        </ul>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end modal-body -->
                        </div><!-- end modal-content -->
                    </div><!-- end modal-dialog -->
                </div><!-- end productRewiew -->


    
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail store style1" >
                            <div class="header">
                                <div class="badges">
                                    @if(!empty($p->discount))<span class="product-badge top left warning-background text-white semi-circle">Discount {{$p->discount}}%</span>
                                    @endif
                                    <span class="product-badge top right text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                                <figure class="">
                                    <a href="javascript:void(0);">
                                       <div class="img-hover-zoom">
                                        <img class="front"style="width:283px;height:300px;" src="{{asset('public/images/'.$p->thumbnail)}}" alt="">
                                        </div>
                                        <div class="img-hover-zoom">
                                        <img class="back" style="width:283px;height:300px;" src="{{asset('public/images/'.$p->thumbnail)}}" alt="">
                                    </div>
                                  
                                    </a>
                                </figure>
                            {{--     <div class="icons">
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView-{{$p->id}}"><i class="fa fa-search"></i></a>
                                </div> --}}
                            </div>
                            <div class="caption">
                                <h6 class="regular"><a href="{{route('main.single_product',$p->slug)}}">{{$p->title}}</a></h6>
                                <p>{{substr($p->description,0,30)}}...</p>
                                <div class="price">
                                    <small class="amount off">${{$p->price}}</small>
                                    <span class="amount text-primary">{{$p->presentPrice($p->discount_price)}}</span>
                                </div>
                                {{-- <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a> --}}
                                <form style="display:inline-block;"action="{{route('main.cart.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="name" value="{{$p->title}}">
                                        <input type="hidden" name="dd_price" value="{{$p->discount_price}}">
                                        <input type="hidden" name="id" value="{{$p->id}}">
                                        <input type="submit" value="Add To cart" style="border-style: none;background:none;">


                                </form>
                                <a style="display:inline-block;"class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                            </div><!-- end caption -->
                        </div><!-- end thumbnail -->
                    </div><!-- end col -->


                    {{-- Model for details --}}

                  
                



                @endforeach()
                                
                <hr class="spacer-30 no-border"/>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box-banner-img">
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('public/theme/img/banners/banner_04.jpg')}}" alt=""/>
                                </a>
                            </figure>
                        </div><!-- end box-banner-img -->
                    </div><!-- end col -->
                    <div class="col-sm-6">
                        <div class="box-banner-img">
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('public/theme/img/banners/banner_05.jpg')}}" alt=""/>
                                </a>
                            </figure>
                        </div><!-- end box-banner-img -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-30 no-border"/>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title"><span class="text-primary">Popular</span> Products</h2>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel column-4 owl-theme">
                            @foreach($product as $pp)
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="{{asset('public/images/'.$pp->thumbnail)}}" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="{{route('main.single_product',$pp->slug)}}">{{$pp->title}}</a></h6>
                                        <div class="price">
                                            <small class="amount off">{{$pp->presentPrice($pp->price)}}</small>
                                            <span class="amount text-primary">{{$pp->presentPrice($pp->discount_price)}}</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->

                            @endforeach()
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
       
        <!-- start section -->
        <section class="section light-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="owl-carousel product-showcase owl-theme">
                          @php
           $processed_data = array();
            foreach($product as $row){

                 if($row->exclusive == 1)
                 {

                     $processed_data[] = $row;
                 }
                 }
             

        @endphp
                            @foreach($processed_data as $ee)
                            <div class="product">
                                <div class="row">
                                    <div class="col-sm-4 vertical-align">
                                        <figure>
                                            <a href="shop-single-product-v1.html"> 
                                                <img alt="img" src="{{asset('public/images/'.$ee->thumbnail)}}">
                                            </a>
                                        </figure>
                                    </div><!-- end col -->
                                    <div class="col-sm-8 vertical-align">
                                        <h4><a href="shop-single-product-v1.html">Lorem ipsum dolor sit amet</a></h4>
                                        <ul class="list list-inline">
                                            <li><del class="text-danger">{{$ee->presentPrice($ee->price)}}</del></li>
                                            <li><h5 class="text-primary">{{$ee->presentPrice($ee->discount_price)}}</h5></li>
                                            <li>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star-half-o text-warning"></i>
                                            </li>
                                        </ul>
                                        <ul class="countdown list-inline">
                                            <li class="round">
                                                <span class="days">00</span>
                                                <p>Days</p>
                                            </li>
                                            <li class="round">
                                                <span class="hours">00</span>
                                                <p>Hours</p>
                                            </li>
                                            <li class="round">
                                                <span class="minutes">00</span>
                                                <p>Mins</p>
                                            </li>
                                            <li class="round">
                                                <span class="seconds">00</span>
                                                <p>Secs</p>
                                            </li>
                                        </ul><!-- end countdown -->

                                        <p>{!! $ee->description!!}</p>

                                        <a title="Add to Cart" class="btn btn-default btn-sm semi-circle"> 
                                            <i class="fa fa-shopping-cart mr-5"></i> Add to Cart
                                        </a>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end product -->
                                @endforeach()
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        
        <!-- start section -->
        <section class="section image-background layer-dark" style="background-image: url(img/slider/slider_03.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title text-white">Our Categories</h2>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel column-5 owl-theme">
                            @foreach($category as $cat)
                              
                            <div class="cat-item">
                                <div class="cat-img">
                                    <figure>
                                        <a href="javascript:void(0);">
                                            <img src="{{asset('public/theme/img/products/men_03.jpg')}}" />
                                        </a>
                                    </figure>
                                </div><!-- end cat-img -->
                                <div class="cat-title">
                                    <h6><a href="javascript:void(0)">{{$cat->name}}</a></h6>
                                </div><!-- end cat-title -->
                            </div><!-- end cat-item -->
                           
                            @endforeach()
                            
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title"><span class="text-primary">Latest</span> News</h2>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div id="owl-demo" class="owl-carousel column-3 owl-theme">
                            <div class="item">
                                <div class="thumbnail blog">
                                    <div class="header">
                                        <figure>
                                            <img src="{{asset('public/theme/img/blog/blog_01.jpg')}}">
                                        </figure>
                                        <div class="meta">
                                            <span><i class="fa fa-calendar mr-5"></i>Oct 25, 2016</span>
                                            <span><i class="fa fa-comment mr-5"></i>(15)</span>
                                            <span><i class="fa fa-heart mr-5"></i>(35)</span>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6><a href="blog-article-v1.html">Care & Clean Instructions</a></h6>
                                        <div class="author-category">
                                            <span class="author mr-20">
                                                <i class="fa fa-user mr-5"></i><a href="javascript:void(0);">Joe Doe</a>
                                            </span>
                                            <span class="category">
                                                <a href="javascript:void(0);">Post Formats</a>
                                            </span>
                                        </div>
                                        <p>Aenean semper lacus sed molestie sollicitudin. In semper, tellus id posuere interdum, est justo faucibus quam, sed eleifend arcu nulla id eros.</p>
                                        <a href="blog-article-v1.html" class="btn btn-default semi-circle btn-sm">Read more</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                            <div class="item">
                                <div class="thumbnail blog">
                                    <div class="header">
                                        <figure>
                                            <img src="{{asset('public/theme/img/blog/blog_02.jpg')}}">
                                        </figure>
                                        <div class="meta">
                                            <span><i class="fa fa-calendar mr-5"></i>Oct 25, 2016</span>
                                            <span><i class="fa fa-comment mr-5"></i>(15)</span>
                                            <span><i class="fa fa-heart mr-5"></i>(35)</span>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6><a href="blog-article-v1.html">Design for Work Place</a></h6>
                                        <div class="author-category">
                                            <span class="author mr-20">
                                                <i class="fa fa-user mr-5"></i><a href="javascript:void(0);">Joe Doe</a>
                                            </span>
                                            <span class="category">
                                                <a href="javascript:void(0);">Post Formats</a>
                                            </span>
                                        </div>
                                        <p>Aenean semper lacus sed molestie sollicitudin. In semper, tellus id posuere interdum, est justo faucibus quam, sed eleifend arcu nulla id eros.</p>
                                        <a href="blog-article-v1.html" class="btn btn-default semi-circle btn-sm">Read more</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                            <div class="item">
                                <div class="thumbnail blog">
                                    <div class="header">
                                        <figure>
                                            <img src="{{asset('public/theme/img/blog/blog_03.jpg')}}">
                                        </figure>
                                        <div class="meta">
                                            <span><i class="fa fa-calendar mr-5"></i>Oct 25, 2016</span>
                                            <span><i class="fa fa-comment mr-5"></i>(15)</span>
                                            <span><i class="fa fa-heart mr-5"></i>(35)</span>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6><a href="blog-article-v1.html">Style your Bedroom</a></h6>
                                        <div class="author-category">
                                            <span class="author mr-20">
                                                <i class="fa fa-user mr-5"></i><a href="javascript:void(0);">Joe Doe</a>
                                            </span>
                                            <span class="category">
                                                <a href="javascript:void(0);">Post Formats</a>
                                            </span>
                                        </div>
                                        <p>Aenean semper lacus sed molestie sollicitudin. In semper, tellus id posuere interdum, est justo faucibus quam, sed eleifend arcu nulla id eros.</p>
                                        <a href="blog-article-v1.html" class="btn btn-default semi-circle btn-sm">Read more</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                            <div class="item">
                                <div class="thumbnail blog">
                                    <div class="header">
                                        <figure>
                                            <img src="{{asset('public/theme/img/blog/blog_04.jpg')}}">
                                        </figure>
                                        <div class="meta">
                                            <span><i class="fa fa-calendar mr-5"></i>Oct 25, 2016</span>
                                            <span><i class="fa fa-comment mr-5"></i>(15)</span>
                                            <span><i class="fa fa-heart mr-5"></i>(35)</span>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6><a href="blog-article-v1.html">Decorating Tips</a></h6>
                                        <div class="author-category">
                                            <span class="author mr-20">
                                                <i class="fa fa-user mr-5"></i><a href="javascript:void(0);">Joe Doe</a>
                                            </span>
                                            <span class="category">
                                                <a href="javascript:void(0);">Post Formats</a>
                                            </span>
                                        </div>
                                        <p>Aenean semper lacus sed molestie sollicitudin. In semper, tellus id posuere interdum.</p>
                                        <a href="blog-article-v1.html" class="btn btn-default semi-circle btn-sm">Read more</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-30 no-border"/>
                
                <div class="row">
                    <div class="col-sm-4">
                        <div class="widget">
                            <h5 class="subtitle text-uppercase"><span class="text-primary">New</span> Products</h5>
                            
                            <ul class="items">
                                    @foreach($product as $data)
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="{{asset('public/images/'.$data->thumbnail)}}"" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <h6 class="regular"> 
                                            <a href="{{route('main.single_product',$data->slug)}}">{{$data->title}}</a> 
                                        </h6>
                                        <span class="price text-primary">{{$data->presentPrice($data->discount_price)}}</span>
                                        <div class="rate text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li><!-- end item -->
                               @endforeach
                                
                               
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    
                    <div class="col-sm-4">
                        <div class="widget">
                            <h5 class="subtitle text-uppercase"><span class="text-primary">On Discount</span> Products</h5>
                            
                            <ul class="items">
                                @php
                                $data = array();
                                    foreach($product as $row)
                                    {
                                        if(!empty($row->discount) && $row->discount != 0)
                                        {
                                            $data[] = $row;
                                        }
                                    }
                                   
                                @endphp

                                @foreach($data as $dd)
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="{{asset('public/images/'.$dd->thumbnail)}}" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <h6 class="regular"> 
                                            <a href="{{route('main.single_product',$dd->slug)}}">{{$dd->title}}</a> 
                                        </h6>
                                        <span class="price text-primary">{{$dd->presentPrice($dd->discount_price)}}</span>
                                        <div class="rate text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li><!-- end item -->
                                @endforeach
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    
                    <div class="col-sm-4">
                        <div class="widget">
                            <h5 class="subtitle text-uppercase"><span class="text-primary">Most Viewed</span> Products</h5>
                            
                            <ul class="items">

                                @foreach($product as $ppp)
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="{{asset('public/images/'.$ppp->thumbnail)}}" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <h6 class="regular"> 
                                            <a href="{{route('main.single_product',$ppp->slug)}}">{{$ppp->title}}</a> 
                                        </h6>
                                        <span class="price text-primary">{{$ppp->presentPrice($ppp->discount_price)}}</span>
                                        <div class="rate text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li><!-- end item -->
                               @endforeach
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        
        <!-- start section -->
        <section class="primary-background">
            <div class="container">
                <div class="box-banner-wide primary-background">
                    <div class="row">
                        <div class="col-sm-4 vertical-align">
                            <h2 class="alt-font text-uppercase text-white">
                                Free <span class="regular">Delivery days!</span>
                            </h2>
                        </div><!-- end col -->
                        <div class="col-sm-4 vertical-align">
                            <p class="mt-20">Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum claritatem.</p>
                        </div><!-- end col -->
                        <div class="col-sm-4 vertical-align text-right">
                            <a target="_blank" href="https://wrapbootstrap.com/theme/plus-responsive-e-commerce-template-WB0R2CN86" class="btn btn-light semi-circle btn-md">Purchase</a>
                        </div><!-- end col -->   
                    </div><!-- end row -->
                </div><!-- end box-banner-wide -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
     @endsection()
    