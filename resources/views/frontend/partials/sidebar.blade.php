<!-- start sidebar -->
                    <div class="col-sm-3">
                        @if(Auth::user())
                        <div class="widget">
                            <h6 class="subtitle">Account Navigation</h6>
                            
                            <ul class="list list-unstyled">
                                <li>
                                    <a href="my-account.html">My Account</a>
                                </li>
                                <li class="active">
                                    <a href="{{route('main.cart')}}">My Cart <span class="text-primary">({{Cart::content()->count()}})</span></a>
                                </li>
                                <li>
                                    <a href="{{route('user.order_list')}}">My Order</a>
                                </li>
                                <li>
                                    <a href="{{route('main.cart.saveForLater.view')}}">Wishlist <span class="text-primary"></span></a>
                                </li>
                                <li>
                                    <a href="user-information.html">Settings</a>
                                </li>
                            </ul>
                        </div><!-- end widget -->
                        @else
                         <div class="widget">
                            <h6 class="subtitle">Navigation</h6>
                                                            
                            <ul class="list list-unstyled">
                                <li>
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                
                            </ul>
                        </div><!-- end widget -->
                        @endif
                        
                        
                        <div class="widget">
                            <h6 class="subtitle">Featured</h6>
                            @if(isset($product) && ($product->count() > 0))
                            <ul class="items">
                                
                                @foreach($product as $pp)
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="{{asset('public/images/'.$pp->thumbnail)}}" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <p class="product-name"> 
                                            <a href="{{route('main.single_product',$pp->slug)}}">{{$pp->title}}</a> 
                                        </p>
                                        <span class="price text-primary">@if($pp->discount_price){{priceFormat($pp->discount_price)}}@else{{priceFormat($pp->price)}}@endif</span>
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

                            <hr class="spacer-10 no-border">
                            <a href="{{route('main.shop')}}" class="btn btn-default btn-block semi-circle btn-md">All Products</a>
                            @else
                            <h3 class="text-center">No Featured Products</h3>
                                @endif
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->