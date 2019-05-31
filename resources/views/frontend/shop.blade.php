@extends('frontend.layouts.app')
@section('css')
<style>
    .ais-Stats-text{
  font-size: 1.8rem !important;
}
.ais-ClearRefinements-button
{
    font-size: 1.8rem !important;
}
[class^=ais-] {
    font-size: 2rem !important;
    box-sizing: border-box;
}
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.3.1/themes/reset-min.css" integrity="sha256-t2ATOGCtAIZNnzER679jwcFcKYfLlw01gli6F6oszk8=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.3.1/themes/algolia-min.css" integrity="sha256-HB49n/BZjuqiCtQQf49OdZn63XuKFaxcIHWf0HNKte8=" crossorigin="anonymous">

@endsection()
@section('section')


        
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            
                            <li class="active">Shop</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->

        <div class="se-pre-con"></div>
        <div id="snackbar">@if(session()->has('message')){{session()->get('message')}}@endif</div>

        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container-fluid padding">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class="widget">
                            <h6 class="subtitle">Search</h6>
                            
                           <div id="searchbox"></div>

                        </div><!-- end widget -->
                        <div id="clear-refinements"></div>
                        <div class="widget">
                            <h6 class="subtitle">Categories</h6>
                            <div id="refinement-list"></div>
                          {{--   <ul class="list list-unstyled">
                                <li>
                                    <div class="checkbox-input checkbox-default">
                                        <input id="mens-category" class="styled" type="checkbox" checked>
                                        <label for="mens-category">
                                            Mens  <span class="text-dark">(11)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input checkbox-default">
                                        <input id="womens-category" class="styled" type="checkbox" checked>
                                        <label for="womens-category">
                                            Womens <span class="text-dark">(21)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input checkbox-default0">
                                        <input id="kids-category" class="styled" type="checkbox" checked>
                                        <label for="kids-category">
                                            Kids <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input checkbox-default0">
                                        <input id="fashion-category" class="styled" type="checkbox" checked>
                                        <label for="fashion-category">
                                            Fashion <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input checkbox-default0">
                                        <input id="sportwear-category" class="styled" type="checkbox" checked>
                                        <label for="sportwear-category">
                                            Sportwear <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input checkbox-default0">
                                        <input id="bags-category" class="styled" type="checkbox" checked>
                                        <label for="bags-category">
                                            Bags <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input checkbox-default0">
                                        <input id="shoes-category" class="styled" type="checkbox" checked>
                                        <label for="shoes-category">
                                            Shoes <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input checkbox-default0">
                                        <input id="hoseholds-category" class="styled" type="checkbox" checked>
                                        <label for="hoseholds-category">
                                            HoseHolds <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input checkbox-default0">
                                        <input id="technology-category" class="styled" type="checkbox" checked>
                                        <label for="technology-category">
                                            Technology <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                            </ul> --}}
                        </div><!-- end widget -->
                        <div class="widget">
                            <h6 class="subtitle">Prices</h6>
                            <div id="range-slider"></div>
                            
                           {{--  <form method="post" class="price-range" data-start-min="250" data-start-max="650" data-min="0" data-max="1000" data-step="1">
                                <div class="ui-range-values">
                                    <div class="ui-range-value-min">
                                        $<span></span>
                                        <input type="hidden">
                                    </div> -
                                    <div class="ui-range-value-max">
                                        $<span></span>
                                        <input type="hidden">
                                    </div>
                                </div>
                                <div class="ui-range-slider"></div>
                                <button type="submit" class="btn btn-default btn-block btn-md">Filter</button>
                            </form> --}}
                        </div><!-- end widget -->
                        <div class="widget">
                            
                            {{-- <h6 class="subtitle">Brands</h6>
                            
                            <ul class="list list-unstyled">
                                <li>
                                    <div class="checkbox-input">
                                        <input id="armani-brand" class="styled" type="checkbox" checked>
                                        <label for="armani-brand">
                                            Armani  <span class="text-dark">(11)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input id="gucci-brand" class="styled" type="checkbox" checked>
                                        <label for="gucci-brand">
                                            Gucci <span class="text-dark">(21)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input id="chanel-brand" class="styled" type="checkbox">
                                        <label for="chanel-brand">
                                            Chanel <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input id="luis-vuitton-brand" class="styled" type="checkbox">
                                        <label for="luis-vuitton-brand">
                                            Luis Vuitton <span class="text-dark">(12)</span>
                                        </label>
                                    </div>
                                </li>
                            </ul> --}}
                        </div><!-- end widget -->
                        <div class="widget">
                           {{--  <h6 class="subtitle">Colors</h6>
                            
                            <ul class="list list-unstyled">
                                <li>
                                    <div class="checkbox-input">
                                        <input id="red-color" class="styled" type="checkbox" checked>
                                        <label for="red-color">
                                            <span class="color" style="background-color: red;"></span> 
                                            Red  
                                            <span class="text-dark">(121)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input id="green-color" class="styled" type="checkbox">
                                        <label for="green-color">
                                            <span class="color" style="background-color: green;"></span>
                                            Green 
                                            <span class="text-dark">(211)</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox-input">
                                        <input id="blue-color" class="styled" type="checkbox">
                                        <label for="blue-color">
                                            <span class="color" style="background-color: blue;"></span>
                                            Blue 
                                            <span class="text-dark">(120)</span>
                                        </label>
                                    </div>
                                </li>
                            </ul> --}}
                        </div><!-- end widget -->
                        <div class="widget">
                            <h6 class="subtitle">My Cart</h6>
                            
                            <p>There are 2 items in your cart.</p>
                            <hr class="spacer-10">
                            <ul class="items">
                                <li> 
                                    <a href="javascript:void(0);" class="product-image">
                                        <img src="img/products/men_06.jpg" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <div class="close-icon"> 
                                            <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                        </div>
                                        <p class="product-name"> 
                                            <a href="javascript:void(0);">Lorem ipsum dolor sit amet Consectetur</a> 
                                        </p>
                                        <strong class="text-dark">1</strong> x <span class="price text-primary">$19.99</span>
                                    </div>
                                </li><!-- end item -->
                                <li> 
                                    <a href="javascript:void(0);" class="product-image">
                                        <img src="img/products/shoes_01.jpg" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <div class="close-icon"> 
                                            <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                        </div>
                                        <p class="product-name"> 
                                            <a href="javascript:void(0);">Lorem ipsum dolor sit amet Consectetur</a> 
                                        </p>
                                        <strong class="text-dark">1</strong> x <span class="price text-primary">$19.99</span>
                                    </div>
                                </li><!-- end item -->
                            </ul>

                            <hr class="spacer-10">
                            <strong class="text-dark">Cart Subtotal:<span class="pull-right text-primary">$19.99</span></strong>
                            <hr class="spacer-10">
                            <a href="checkout.html" class="btn btn-default semi-circle btn-block btn-md"><i class="fa fa-shopping-basket mr-10"></i>Checkout</a>
                        </div><!-- end widget -->
                        <div class="widget">
                            <h6 class="subtitle">New Collection</h6>
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('public/theme/img/products/men_06.jpg')}}" alt="collection">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                        <div class="widget">
                            <h6 class="subtitle">Popular tags</h6>
                            
                            <ul class="tags">
                                <li>
                                    <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">shoes</a>
                                </li>
                                <li>
                                    <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">shirt</a>
                                </li>
                                <li>
                                    <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">jacket</a>
                                </li>
                                <li>
                                    <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">sunglass</a>
                                </li>
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Shop</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <div id="stats" style="font-size:24px !important;"></div>
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        <div id="hits"></div>
                        <div class="row column-3">

                            {{-- @foreach($product as $p) --}}
                            {{-- <div> --}}
                            {{-- <div class="col-sm-4 col-md-4">
                                <div class="thumbnail store style2">
                                    <div class="header">
                                        <div class="badges">
                                            @if(!empty($p->discount))
                                            <span class="product-badge top left warning-background text-white semi-circle">Discount {{$p->discount}}%</span>
                                            @endif
                                            <span class="product-badge top right text-warning">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </span>
                                        </div>
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img class="front" style="width:283px;height:368px;" src="{{asset('public/images/'.$p->thumbnail)}}" alt="">
                                                <img class="back" style="width:283px;height:368px;" src="{{asset('public/images/'.$p->thumbnail)}}" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="{{route('main.single_product',$p->slug)}}">{{$p->title}}</a></h6>
                                        <div class="price">
                                            <small class="amount off">{{$p->presentPrice($p->price)}}</small>
                                            <span class="amount text-primary">{{$p->presentPrice($p->discount_price)}}</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a> --}}
                                    {{-- </div>end caption --}}
                                {{-- </div>end thumbnail --}}
                            {{-- </divend col --}}
                        {{-- </div>end of width div --}}

                            {{-- @endforeach() --}}
                            
                            
                        <hr class="spacer-10 no-border">
                        
                        <div class="row">


                            <div class="col-sm-12 text-center">
                                <nav>
                                   
                                </nav>
                                   
                                
                            </div><!-- end col -->
                        </div><!-- end row -->
                            <div id="pagination"></div>
                    </div><!-- end col -->   
                </div><!-- end row -->
                 
                
                
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
       @endsection()
       @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3.32.1/dist/algoliasearchLite.js" integrity="sha256-pMaJf0I78weeXGkRMBDO6jSulxC/q3sb0aPdtV2N8n0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@3.2.0" integrity="sha256-/8usMtTwZ01jujD7KAZctG0UMk2S2NDNirGFVBbBZCM=" crossorigin="anonymous"></script>
    
             <script src="{{asset('public/js/algolia-instantsearch.js')}}"></script>
       @endsection()