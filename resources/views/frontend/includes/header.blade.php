<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from diamantgjota.com/themes/plus-v1.3.0/home-v5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 May 2019 13:09:15 GMT -->
<head>
    <title>Plus - E-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="description" content="Plus E-Commerce Template">
    <meta name="author" content="Diamant Gjota" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="plus, html5, css3, template, ecommerce, e-commerce, bootstrap, responsive, creative" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('public/theme/img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('public/theme/img/favicon.ico')}}" type="image/x-icon">
    
    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/swiper.css')}}" />
    
    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="{{asset('public/theme/css/default.css')}}" />
     <link  rel="stylesheet" type="text/css" href="{{asset('public/theme/css/custom.css')}}" />
    
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    
</head>
    <body>
        
        <!-- start section -->
        <section class="primary-background hidden-xs">
            <div class="container-fluid">
                <div class="row grid-space-0">
                    <div class="col-sm-12">
                        <figure>
                            <a href="category.html">
                                <img src="{{asset('public/theme/img/banners/top_banner.jpg')}}" alt=""/>
                            </a>
                        </figure>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        <!-- start topBar -->
        <div class="topBar">
            <div class="container">
                <ul class="list-inline pull-left hidden-sm hidden-xs">
                    <li><span class="text-primary">Have a question?</span> Call +123 4567 8910</li>
                </ul>
                
                <ul class="topBarNav pull-right">
                    <li class="linkdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-usd mr-5"></i>
                            USD
                            <i class="fa fa-angle-down ml-5"></i>
                        </a>
                        <ul class="w-100">
                            <li><a href="javascript:void(0);"><i class="fa fa-eur mr-5"></i>EUR</a></li>
                            <li class="active"><a href="javascript:void(0);"><i class="fa fa-usd mr-5"></i>USD</a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-gbp mr-5"></i>GBP</a></li>
                        </ul>
                    </li>
                    <li class="linkdown">
                        <a href="javascript:void(0);">
                            <img src="{{asset('public/theme/img/flags/flag-french.jpg')}}" class="mr-5" alt="">
                            <span class="hidden-xs">
                                French 
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>    
                        </a>
                        <ul class="w-100">
                            <li><a href="javascript:void(0);"><img src="img/flags/flag-english.jpg" class="mr-5" alt="">English</a></li>
                            <li class="active"><a href="javascript:void(0);"><img src="img/flags/flag-french.jpg" class="mr-5" alt="">French</a></li>
                            <li><a href="javascript:void(0);"><img src="img/flags/flag-german.jpg" class="mr-5" alt="">German</a></li>
                            <li><a href="javascript:void(0);"><img src="img/flags/flag-spain.jpg" class="mr-5" alt="">Spain</a></li>
                        </ul>
                    </li>
                    <li class="linkdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-user mr-5"></i>
                            <span class="hidden-xs">
                                My Account 
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                        </a>
                        <ul class="w-150">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Create Account</a></li>
                            <li class="divider"></li>
                            <li><a href="wishlist.html">Wishlist (5)</a></li>
                            <li><a href="{{route('main.cart')}}">My Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </li>
                    <li class="linkdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-shopping-basket mr-5"></i>
                            <span class="hidden-xs">
                                Cart<sup class="text-primary">({{Cart::instance('default')->count()}})</sup>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>    
                        </a>
                        <ul class="cart w-250">
                            <li>
                                <div class="cart-items">
                                    <ol class="items">
                                        <li> 
                                            <a href="shop-single-product-v1.html" class="product-image">
                                                <img src="img/products/men_06.jpg" alt="Sample Product ">
                                            </a>
                                            <div class="product-details">
                                                <div class="close-icon"> 
                                                    <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                                </div>
                                                <p class="product-name"> 
                                                    <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a> 
                                                </p>
                                                <strong>1</strong> x <span class="price text-primary">$59.99</span>
                                            </div><!-- end product-details -->
                                        </li><!-- end item -->
                                        <li> 
                                            <a href="shop-single-product-v1.html" class="product-image">
                                                <img src="img/products/shoes_01.jpg" alt="Sample Product ">
                                            </a>
                                            <div class="product-details">
                                                <div class="close-icon"> 
                                                    <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                                </div>
                                                <p class="product-name"> 
                                                    <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a> 
                                                </p>
                                                <strong>1</strong> x <span class="price text-primary">$39.99</span>
                                            </div><!-- end product-details -->
                                        </li><!-- end item -->
                                        <li> 
                                            <a href="shop-single-product-v1.html" class="product-image">
                                                <img src="img/products/bags_07.jpg" alt="Sample Product ">
                                            </a>
                                            <div class="product-details">
                                                <div class="close-icon"> 
                                                    <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                                </div>
                                                <p class="product-name"> 
                                                    <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a> 
                                                </p>
                                                <strong>1</strong> x <span class="price text-primary">$29.99</span>
                                            </div><!-- end product-details -->
                                        </li><!-- end item -->
                                    </ol>
                                </div>
                            </li>
                            <li>
                                <div class="cart-footer">
                                    <a href="{{route('main.cart')}}" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View Cart</a>
                                    <a href="checkout.html" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- end container -->
        </div>
        <!-- end topBar -->
        
        <div class="middleBar">
            <div class="container">
                <div class="row display-table">
                    <div class="col-sm-3 vertical-align text-left hidden-xs">
                        <a href="javascript:void(0);">
                            <h2 style="padding-bottom: 20px;">Best Price</h2>
                        </a>
                    </div><!-- end col -->
                    <div class="col-sm-7 vertical-align text-center">
                        <form>
                            <div class="row grid-space-1">
                                <div class="col-sm-6">
                                    <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
                                </div><!-- end col -->
                                <div class="col-sm-3">
                                    <select class="form-control input-lg" name="category">
                                        <option value="all">All Categories</option>
                                        <optgroup label="Mens">
                                            <option value="shirts">Shirts</option>
                                            <option value="coats-jackets">Coats & Jackets</option>
                                            <option value="underwear">Underwear</option>
                                            <option value="sunglasses">Sunglasses</option>
                                            <option value="socks">Socks</option>
                                            <option value="belts">Belts</option>
                                        </optgroup>
                                        <optgroup label="Womens">
                                            <option value="bresses">Bresses</option>
                                            <option value="t-shirts">T-shirts</option>
                                            <option value="skirts">Skirts</option>
                                            <option value="jeans">Jeans</option>
                                            <option value="pullover">Pullover</option>
                                        </optgroup>
                                        <option value="kids">Kids</option>
                                        <option value="fashion">Fashion</option>
                                        <optgroup label="Sportwear">
                                            <option value="shoes">Shoes</option>
                                            <option value="bags">Bags</option>
                                            <option value="pants">Pants</option>
                                            <option value="swimwear">Swimwear</option>
                                            <option value="bicycles">Bicycles</option>
                                        </optgroup>
                                        <option value="bags">Bags</option>
                                        <option value="shoes">Shoes</option>
                                        <option value="hoseholds">HoseHolds</option>
                                        <optgroup label="Technology">
                                            <option value="tv">TV</option>
                                            <option value="camera">Camera</option>
                                            <option value="speakers">Speakers</option>
                                            <option value="mobile">Mobile</option>
                                            <option value="pc">PC</option>
                                        </optgroup>
                                    </select>
                                </div><!-- end col -->
                                <div class="col-sm-3">
                                    <input type="submit"  class="btn btn-default btn-block btn-lg" value="Search">
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end col -->
                    <div class="col-sm-2 vertical-align header-items hidden-xs">
                        <div class="header-item mr-5">
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                <i class="fa fa-heart-o"></i>
                                <sub>32</sub>
                            </a>
                        </div>
                        <div class="header-item">
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Compare">
                                <i class="fa fa-refresh"></i>
                                <sub>2</sub>
                            </a>
                        </div>
                    </div><!-- end col -->
                </div><!-- end  row -->
            </div><!-- end container -->
        </div><!-- end middleBar -->
        
        <!-- start navbar -->
        <div class="navbar yamm navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-3" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="javascript:void(0);" class="navbar-brand visible-xs">
                        <img src="img/logo.png" alt="logo">
                    </a>
                </div>
                <div id="navbar-collapse-3" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!-- Home -->
                        <li class="dropdown active"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Home<i class="fa fa-angle-down ml-5"></i></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="home-v1.html">Home - Version 1</a></li>
                                <li><a href="home-v2.html">Home - Version 2</a></li>
                                <li><a href="home-v3.html">Home - Version 3</a></li>
                                <li><a href="home-v4.html">Home - Version 4 <span class="label primary-background">1.1</span></a></li>
                                <li class="active"><a href="home-v5.html">Home - Version 5 <span class="label primary-background">1.1</span></a></li>
                                <li><a href="home-v6.html">Home - Version 6 <span class="label primary-background">1.2</span></a></li>
                                <li><a href="home-v7.html">Home - Version 7 <span class="label primary-background">1.3</span></a></li>
                            </ul><!-- end ul dropdown-menu -->
                        </li><!-- end li dropdown -->    
                        <!-- Features -->
                        <li class="dropdown left"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Features<i class="fa fa-angle-down ml-5"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route("main.shop")}}">Shop</a></li>
                                <li><a href="footers.html">Footers</a></li>
                                <li><a href="sliders.html">Sliders</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="grid.html">Grid</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Dropdown Level 1</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Dropdown Level</a></li>
                                        <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Dropdown Level 2</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0);">Dropdown Level</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul><!-- end ul dropdown-menu -->
                        </li><!-- end li dropdown -->
                        <!-- Pages -->
                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages<i class="fa fa-angle-down ml-5"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="yamm-content">
                                        <div class="row">
                                            <ul class="col-sm-3">
                                                <li class="title">
                                                    <h6>Shop Pages</h6>
                                                </li>
                                                <li><a href="shop-sidebar-left.html">Sidebar Left</a></li>
                                                <li><a href="shop-sidebar-right.html">Sidebar Right</a></li>
                                                <li><a href="shop-filter-top.html">Filters Top</a></li>
                                                <li><a href="shop-full-width-sidebar-left.html">Full Width Sidebar Left</a></li>
                                                <li><a href="shop-full-width-sidebar-right.html">Full Width Sidebar Right</a></li>
                                                <li><a href="shop-full-width-filter-top.html">Full Width Filters Top</a></li>
                                                <li><a href="category.html">Category <span class="label primary-background">1.1</span></a></li>
                                                <li><a href="shop-single-product-v1.html">Single product</a></li>
                                                <li><a href="shop-single-product-v2.html">Single product v2 <span class="label primary-background">1.3</span></a></li>
                                                <li class="title">
                                                    <h6>Contact Pages</h6>
                                                </li>
                                                <li><a href="contact-v1.html">Contact Us Version 1</a></li>
                                                <li><a href="contact-v2.html">Contact Us Version 2</a></li>
                                            </ul><!-- end ul col -->
                                            <ul class="col-sm-3">
                                                <li class="title">
                                                    <h6>About us Pages</h6>
                                                </li>
                                                <li><a href="about-us-v1.html">About Us Version 1</a></li>
                                                <li><a href="about-us-v2.html">About Us Version 2</a></li>
                                                <li><a href="about-us-v3.html">About Us Version 3</a></li>
                                                <li class="title">
                                                    <h6>Blog Pages</h6>
                                                </li>
                                                <li><a href="blog-v1.html">Blog Version 1</a></li>
                                                <li><a href="blog-v2.html">Blog Version 2</a></li>
                                                <li><a href="blog-v3.html">Blog Version 3</a></li>
                                                <li><a href="blog-article-v1.html">Blog article</a></li>
                                            </ul><!-- end ul col -->
                                            <ul class="col-sm-3">
                                                <li class="title">
                                                    <h6>User account</h6>
                                                </li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="login-register.html">Login or Register</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="user-information.html">User Information</a></li>
                                                <li><a href="order-list.html">Order List</a></li>
                                                <li><a href="order-confirmation.html">Order Confirmation <span class="label primary-background">1.1</span></a></li>
                                                <li><a href="forgot-password.html">Forgot Password</a></li>
                                            </ul><!-- end ul col -->
                                            <ul class="col-sm-3">
                                                <li class="title">
                                                    <h6>Other Pages</h6>
                                                </li>
                                                <li><a href="help.html">Help</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                                <li><a href="blank-page.html">Blank Page <span class="label primary-background">1.1</span></a></li>
                                                <li><a href="404-error.html">404 Error</a></li>
                                                <li><a href="500-error.html">500 Error</a></li>
                                                <li><a href="coming-soon.html">Coming soon</a></li>
                                                <li><a href="subscribe.html">Subscribe</a></li>
                                            </ul><!-- end ul col -->
                                        </div><!-- end row -->
                                    </div><!-- end yamn-content -->
                                </li><!-- end li -->
                           </ul><!-- end ul dropdown-menu -->
                        </li><!-- end li dropdown -->
                        <!-- elements -->
                        <li><a href="elements.html">Elements</a></li>
                        <!-- Collections -->
                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Collections<i class="fa fa-angle-down ml-5"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3">
                                                <a href="javascript:void(0);">
                                                    <figure class="zoom-out">
                                                        <img alt="" src="img/banners/collection_01.jpg">
                                                    </figure>
                                                </a>
                                            </div><!-- end col -->
                                            <div class="col-xs-12 col-sm-3">
                                                <a href="javascript:void(0);">
                                                    <figure class="zoom-in">
                                                        <img alt="" src="img/banners/collection_02.jpg">
                                                    </figure>
                                                </a>
                                            </div><!-- end col -->
                                            <div class="col-xs-12 col-sm-3">
                                                <a href="javascript:void(0);">
                                                    <figure class="zoom-out">
                                                        <img alt="" src="img/banners/collection_03.jpg">
                                                    </figure>
                                                </a>
                                            </div><!-- end col -->
                                            <div class="col-xs-12 col-sm-3">
                                                <a href="javascript:void(0);">
                                                    <figure class="zoom-in">
                                                        <img alt="" src="img/banners/collection_04.jpg">
                                                    </figure>
                                                </a>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                        
                                        <hr class="spacer-20 no-border">
                                        
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3">
                                                <h6>Pellentes que nec diam lectus</h6>
                                                <p>Proin pulvinar libero quis auctor pharet ra. Aenean fermentum met us orci, sedf eugiat augue pulvina r vitae. Nulla dolor nisl, molestie nec aliquam vitae, gravida sodals dolor...</p>
                                                <button type="button" class="btn btn-default round btn-md">Read more</button>
                                            </div><!-- end col -->
                                            <div class="col-xs-12 col-sm-3">
                                                <div class="thumbnail store style1">
                                                    <div class="header">
                                                        <div class="badges">
                                                            <span class="product-badge top left white-backgorund text-primary semi-circle">Sale</span>
                                                            <span class="product-badge top right text-primary">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </span>
                                                        </div>
                                                        <figure class="layer">
                                                            <img src="img/products/men_01.jpg" alt="">
                                                        </figure>
                                                        <div class="icons">
                                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                                        <div class="price">
                                                            <small class="amount off">$68.99</small>
                                                            <span class="amount text-primary">$59.99</span>
                                                        </div>
                                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                                    </div><!-- end caption -->
                                                </div><!-- end thumbnail -->
                                            </div><!-- end col -->
                                            <div class="col-xs-12 col-sm-3">
                                                <div class="thumbnail store style1">
                                                    <div class="header">
                                                        <div class="badges">
                                                            <span class="product-badge top left white-backgorund text-primary semi-circle">Sale</span>
                                                            <span class="product-badge top right text-primary">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </span>
                                                        </div>
                                                        <figure class="layer">
                                                            <img src="img/products/women_01.jpg" alt="">
                                                        </figure>
                                                        <div class="icons">
                                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                                        <div class="price">
                                                            <small class="amount off">$68.99</small>
                                                            <span class="amount text-primary">$59.99</span>
                                                        </div>
                                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                                    </div><!-- end caption -->
                                                </div><!-- end thumbnail -->
                                            </div><!-- end col -->
                                            <div class="col-xs-12 col-sm-3">
                                                <div class="thumbnail store style1">
                                                    <div class="header">
                                                        <div class="badges">
                                                            <span class="product-badge top left white-backgorund text-primary semi-circle">Sale</span>
                                                            <span class="product-badge top right text-primary">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </span>
                                                        </div>
                                                        <figure class="layer">
                                                            <img src="img/products/kids_01.jpg" alt="">
                                                        </figure>
                                                        <div class="icons">
                                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                                        <div class="price">
                                                            <small class="amount off">$68.99</small>
                                                            <span class="amount text-primary">$59.99</span>
                                                        </div>
                                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                                    </div><!-- end caption -->
                                                </div><!-- end thumbnail -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end yamm-content -->
                                </li><!-- end li -->
                            </ul><!-- end dropdown-menu -->
                        </li><!-- end dropdown -->
                    </ul><!-- end navbar-nav -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown right">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <span class="hidden-sm">Categories</span><i class="fa fa-bars ml-5"></i>
                            </a>
                                  
                                <ul class="dropdown-menu">
                                    @foreach($category as $cat)
                                            
                                <li class="dropdown-submenu">
                                    <a href="{{route('main.shop',['category' =>$cat->slug ])}}" class="dropdown-toggle" >{{$cat->name}}</a>
                                     <ul class="dropdown-menu">
                                            @foreach($cat->children as $pp)
                                        <li><a href="{{route('main.shop',['category' =>$pp->slug ])}}">{{$pp->name}}</a></li>
                                        @endforeach()
                                    </ul>
                                    
                                   
                                </li>
                                
                                                             @endforeach
                            </ul><!-- end ul dropdown-menu -->
                        </li><!-- end dropdown -->
                    </ul><!-- end navbar-right -->
                </div><!-- end navbar collapse -->
            </div><!-- end container -->
        </div><!-- end navbar -->