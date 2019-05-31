@extends('frontend.layouts.app')
@section('section')
        
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            
                            <li class="active">Search</li>
                                 <li class="active">{{Request()->get('query')}}</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        <div id="snackbar">@if($errors->any()){{$errors->first()}}@endif</div>
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="aa-input-container" id="aa-input-container">
    <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search for Products..." name="search" autocomplete="off" />
    <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
        <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
    </svg>
</div>
                    <div class="col-sm-12">
                         @if(isset($product) && $product->isNotEmpty()) 
                                <div class="row">
                           
                            @foreach($product as $pp)
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <div class="badges">
                                            <span class="product-badge top left primary-background text-white semi-circle">Sale</span>
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
                                                <img class="front" style="width:283px;height:368px;" src="{{asset('public/images/'.$pp->thumbnail)}}" alt="">
                                                <img class="back" style="width:283px;height:368px;" src="{{asset('public/images/'.$pp->thumbnail)}}" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="{{route('main.single_product',$pp->slug)}}">{{$pp->title}}</a></h6>
                                        <div class="price">
                                            <small class="amount off">{{$pp->presentPrice($pp->price)}}</small>
                                            <span class="amount text-primary">{{$pp->presentPrice($pp->discount_price)}}</span>
                                        </div>
                                         <form action="{{route('main.cart.store')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="name" value="{{$pp->title}}">
                                        <input type="hidden" name="dd_price" value="{{$pp->discount_price}}">
                                        <input type="hidden" name="id" value="{{$pp->id}}">
                                        <input type="submit" value="Add To cart" style="border-style: none;background:none;">


                                </form>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->
                            
                           @endforeach
                           
                        </div><!-- end row -->
                        
                        <hr class="spacer-10 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                {{-- {{$product->links()}} --}}
                                {{$product->appends(request()->input())->links()}}
                            </div><!-- end col -->
                        </div><!-- end row -->
                        @else
                           <h2 class="text-center">We'r in Beta Phase..We'll add more products soon.</h2>
                           @endif
                    </div><!-- end col -->   
                </div><!-- end row -->

                <!-- Modal Product Quick View -->
                <div class="modal fade productQuickView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5>Lorem ipsum dolar sit amet</h5>
                            </div><!-- end modal-header -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                                            <div class='carousel-inner'>
                                                <div class='item active'>
                                                    <figure>
                                                        <img src='img/products/men_01.jpg' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
                                                    </div>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <figure>
                                                        <img src='img/products/men_03.jpg' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <figure>
                                                        <img src='img/products/men_04.jpg' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <figure>
                                                        <img src='img/products/men_05.jpg' alt=''/>
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
                                                <li data-target='.product-slider' data-slide-to='0' class='active'><img src='img/products/men_01.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='1'><img src='img/products/men_02.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='2'><img src='img/products/men_03.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='3'><img src='img/products/men_04.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='4'><img src='img/products/men_05.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='5'><img src='img/products/men_06.jpg' alt='' /></li>
                                            </ol><!-- end carousel-indicators -->
                                        </div><!-- end carousel -->
                                    </div><!-- end col -->
                                    <div class="col-sm-7">
                                        <p class="text-gray alt-font">Product code: 1032446</p>

                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star-half-o text-warning"></i>
                                        <span>(12 reviews)</span>
                                        <h4 class="text-primary">$79.00</h4>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
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
                
            </div><!-- end container -->
        </section>
        <!-- end section -->
       @endsection

        @section('scripts')

        <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
        <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
        <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
        <script src="{{asset('public/js/algolia.js')}}"></script>
        
        @endsection()