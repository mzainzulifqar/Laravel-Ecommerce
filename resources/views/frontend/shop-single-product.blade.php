@extends('frontend.layouts.app')
@section('section')        
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                          <li class="active">Product Details</li>
                            <li class="active">{{$product->title}}</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        <div class="se-pre-con"></div>
        <div id="snackbar">@if(session()->has('message')){{session()->get('message')}}@endif</div>
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-4">
                        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                            <div class='carousel-inner'>
                                <div class='item active'>
                                    <figure>
                                        <img src='{{asset('public/images/'.$product->thumbnail)}}' alt='' />
                                    </figure>
                                </div><!-- end item -->
                               
                                <div class='item'>
                                    <figure>
                                        <img src='{{asset('public/images/'.$product->thumbnail)}}' alt='' />
                                    </figure>
                                </div><!-- end item -->
                                <div class='item'>
                                    <figure>
                                        <img src='{{asset('public/images/'.$product->thumbnail)}}' alt='' />
                                    </figure>
                                </div><!-- end item -->
                                <div class='item'>
                                    <figure>
                                        <img src='{{asset('public/images/'.$product->thumbnail)}}' alt=''/>
                                    </figure>
                                </div><!-- end item -->

                                <!-- Arrows -->
                                <a class='left carousel-control' href='.html' data-slide='prev'>
                                    <span class='fa fa-angle-left'></span>
                                </a>
                                <a class='right carousel-control' href='.html' data-slide='next'>
                                    <span class='fa fa-angle-right'></span>
                                </a>
                            </div><!-- end carousel-inner -->

                            <!-- thumbs -->
                            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                <li data-target='.product-slider' data-slide-to='0' class='active'><img src='{{asset('public/images/'.$product->thumbnail)}}' alt='' /></li>
                                <li data-target='.product-slider' data-slide-to='1'><img src='{{asset('public/images/'.$product->thumbnail)}}' alt='' /></li>
                                <li data-target='.product-slider' data-slide-to='2'><img src='{{asset('public/images/'.$product->thumbnail)}}' alt='' /></li>
                                <li data-target='.product-slider' data-slide-to='3'><img src='{{asset('public/images/'.$product->thumbnail)}}' alt='' /></li>
                                <li data-target='.product-slider' data-slide-to='4'><img src='{{asset('public/images/'.$product->thumbnail)}}' alt='' /></li>
                            </ol><!-- end carousel-indicators -->
                        </div><!-- end carousel -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="title">{{$product->title}}</h2>
                                    <p class="text-gray alt-font">Product code: {{$product->id}}</p>
                                    
                                    <ul class="list list-inline">
                                        <li><h6 class="text-danger text-xs">{{$product->presentPrice($product->price)}}</h6></li>
                                        <li><h5 class="text-primary">{{$product->presentPrice($product->discount_price)}}</h5></li>
                                        <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-half-o text-warning"></i>
                                        </li>
                                        <li><a href="javascript:void(0);">(4 reviews)</a></li>
                                    </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-10 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <p>{!!$product->description!!}</p>
                                <ul class="list alt-list">
                                    <li><i class="fa fa-check"></i> Lorem Ipsum dolor sit amet</li>
                                    <li><i class="fa fa-check"></i> Cras aliquet venenatis sapien fringilla.</li>
                                    <li><i class="fa fa-check"></i> Duis luctus erat vel pharetra aliquet.</li>
                                </ul>
                                <hr class="spacer-15">
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
                                <hr class="spacer-15">
                                
                                <ul class="list list-inline">
                                    <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Add to Cart</button></li>
                                    <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
                                    <li>Share this product: </li>
                                    <li>
                                        <ul class="social-icons style1">
                                            <li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-60">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs style2 tabs-left">
                            <li class="active"><a href="#description" data-toggle="tab">Additional Info</a></li>
                            <li><a href="#reviews" data-toggle="tab">Reviews (4)</a></li>
                        </ul>
                    </div><!-- end col -->
                    <div class="col-xs-12 col-sm-9">
                        <!-- Tab panes -->
                        <div class="tab-content style2">
                            <div class="tab-pane active" id="description">
                                <h5>Additional Info</h5>
                                <p>Vestibulum tellus justo, vulputate ac nunc eu, laoreet pellentesque erat. 
                                    Nulla in fringilla ex. Nulla finibus rutrum lorem vehicula facilisis. 
                                    Sed ornare congue mi, et volutpat diam. Suspendisse eget augue id magna placerat dignissim. 
                                    Fusce at turpis neque. Nullam commodo consequat risus et iaculis.
                                </p>
                                
                                <hr class="spacer-15">
                                
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>Dimensions</dt>
                                            <dd>120 x 75 x 90 cm</dd>
                                            <dt>Colors</dt>
                                            <dd>white, black, brown</dd>
                                            <dt>Materials</dt>
                                            <dd>cotton</dd>
                                        </dl>
                                    </div><!-- end col -->
                                    <div class="col-sm-12 col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>Weight</dt>
                                            <dd>1.65 kg</dd>
                                            <dt>Manufacturer</dt>
                                            <dd>Istanbul</dd>
                                        </dl>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane" id="reviews">
                                <h5>4 Review for "Lorem ipsum dolor sit amet"</h5>
                                
                                <hr class="spacer-10 no-border">
                                
                                <div class="comments">
                                    <div class="comment-image">
                                        <figure>
                                            <img src="img/team/team_01.jpg" alt="" />
                                        </figure>
                                    </div><!-- end comments-image -->
                                    <div class="comment-content">
                                        <div class="comment-content-head">
                                            <h6 class="comment-title">Lorem ipsum dolor sit</h6>
                                            <ul class="list list-inline comment-meta">
                                                <li>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                            </ul>
                                        </div><!-- end comment-content-head -->
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sequi ipsa fugit officia eos! Sapiente laboriosam molestiae praesentium ducimus culpa. Magnam, odit, optio. Possimus similique eligendi explicabo, dolore, beatae sequi.</p>
                                        <cite>Joe Doe</cite>
                                    </div><!-- end comment-content -->
                                </div><!-- end comments -->
                                
                                <div class="comments">
                                    <div class="comment-image">
                                        <figure>
                                            <img src="img/team/team_02.jpg" alt="" />
                                        </figure>
                                    </div><!-- end comments-image -->
                                    <div class="comment-content">
                                        <div class="comment-content-head">
                                            <h6 class="comment-title">Lorem ipsum dolor sit</h6>
                                            <ul class="list list-inline comment-meta">
                                                <li>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                </li>
                                            </ul>
                                        </div><!-- end comment-content-head -->
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sequi ipsa fugit officia eos! Sapiente laboriosam molestiae praesentium ducimus culpa. Magnam, odit, optio.</p>
                                        <cite>Joe Doe</cite>
                                    </div><!-- end comment-content -->
                                </div><!-- end comments -->
                                
                                <div class="comments">
                                    <div class="comment-image">
                                        <figure>
                                            <img src="img/team/team_03.jpg" alt="" />
                                        </figure>
                                    </div><!-- end comments-image -->
                                    <div class="comment-content">
                                        <div class="comment-content-head">
                                            <h6 class="comment-title">Lorem ipsum dolor sit</h6>
                                            <ul class="list list-inline comment-meta">
                                                <li>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star-o text-warning"></i>
                                                </li>
                                            </ul>
                                        </div><!-- end comment-content-head -->
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sequi ipsa fugit officia eos! Sapiente laboriosam molestiae praesentium ducimus culpa. Magnam, odit, optio.</p>
                                        <cite>Jane Doe</cite>
                                    </div><!-- end comment-content -->
                                </div><!-- end comments -->
                                
                                <div class="comments">
                                    <div class="comment-image">
                                        <figure>
                                            <img src="img/team/team_04.jpg" alt="" />
                                        </figure>
                                    </div><!-- end comments-image -->
                                    <div class="comment-content">
                                        <div class="comment-content-head">
                                            <h6 class="comment-title">Lorem ipsum dolor sit</h6>
                                            <ul class="list list-inline comment-meta">
                                                <li>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star-half-empty text-warning"></i>
                                                    <i class="fa fa-star-o text-warning"></i>
                                                </li>
                                            </ul>
                                        </div><!-- end comment-content-head -->
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sequi ipsa fugit officia eos! Sapiente laboriosam molestiae praesentium ducimus culpa. Magnam, odit, optio.</p>
                                        <cite>John Doe</cite>
                                    </div><!-- end comment-content -->
                                </div><!-- end comments -->
                                
                                <hr class="spacer-30">
                                
                                <h5>Add a review</h5>
                                <p>How do you rate this product?</p>
                                        
                                <hr class="spacer-5 no-border">

                                <form>
                                    <input type="text" class="rating rating-loading" value="5" data-size="sm" title="">
                                </form>

                                <hr class="spacer-10 no-border">

                                <div class="form-group">
                                    <label for="reviewName">Name</label>
                                    <input type="text" id="reviewName" class="form-control input-md" placeholder="Your Name">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="reviewEmail">E-mail</label>
                                    <input type="text" id="reviewEmail" class="form-control input-md" placeholder="Your E-mail">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="reviewMessage">Review</label>
                                    <textarea id="reviewMessage" rows="5" class="form-control" placeholder="Your review"></textarea>
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-default round btn-md" value="Submit Review">
                                </div><!-- end form-group -->
                            </div><!-- end tab-pane -->
                        </div><!-- end tab-content -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-60">
                
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="mb-20">You May Also Like</h4>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div id="owl-demo" class="owl-carousel column-4 owl-theme">

                            @foreach($data as $dd)

                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure>
                                            <a href="shop-single-product-v1.html">
                                                <img src="{{asset('public/images/'.$dd->thumbnail)}}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="{{route('main.single_product',$dd->slug)}}">{{$dd->title}}</a></h6>
                                        <div class="price">
                                            <small class="amount off">{{$dd->presentPrice($dd->price)}}</small>
                                            <span class="amount text-primary">{{$dd->presentPrice($dd->discount_price)}}</span>
                                        </div>
                                        <span class="product-badge bottom left text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
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
         @endsection()