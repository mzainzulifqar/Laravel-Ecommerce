       @extends('frontend.layouts.app')
@section('section')      
 <!-- start section -->
 <!-- The actual snackbar -->
<div id="snackbar">@if(session()->has('message')){{session()->get('message')}}@endif</div>
        
        
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    @include('frontend.partials.sidebar')
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">My Wishlist</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">    
                                    <table class="table">
                                        <tbody>
                                            @foreach($data as $items)
                                               
                                            
                                            <tr>
                                                <td>
                                                    <a href="shop-single-product-v1.html">
                                                        <img width="60px" src="{{asset("public/images/".$items->thumbnail)}}" alt="product">
                                                    </a>
                                                </td>
                                                <td>
                                                    <h6 class="regular"><a href="shop-single-product-v1.html">{{$items->title}}</a></h6>
                                                    
                                                </td>
                                                <td>
                                                    <span class="text-primary">@if(isset($items->discount_price)){{priceFormat($items->discount_price)}}@else{{priceFormat($items->price)}}@endif</span>
                                                </td>
                                                <td>
                                                    <form style="display:inline-block;"action="{{route('main.cart.movetocart')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="name" value="{{$items->title}}">
                                        <input type="hidden" name="dd_price" value="@if(isset($items->discount_price)){{priceFormat($items->discount_price)}}@else{{priceFormat($items->price)}}@endif">
                                        <input type="hidden" name="id" value="{{$items->product_id}}">
                                        <input type="submit" value="Add To cart" class="btn btn-default round btn-sm">


                                </form>
                                                    
                                                </td>
                                                <td>
                                                    <button type="button" class="close">×</button>
                                                </td>
                                            </tr>
                                           @endforeach()
                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->
                                
                                <hr class="spacer-10 no-border">
                                
                                <a href="shop-sidebar-left.html" class="btn btn-light semi-circle btn-md">
                                    <i class="fa fa-arrow-left mr-5"></i> Continue shopping
                                </a>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
       @endsection()