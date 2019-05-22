@extends('frontend.layouts.app')
@section('section')        
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Login</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        {{-- <div class="se-pre-con"></div> --}}
        <div id="snackbar">@if(session()->has('message')){{session()->get('message')}}@endif</div>
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class="widget">
                            <h6 class="subtitle">New Collection</h6>
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('public/theme/img/products/men_06.jpg')}}" alt="collection">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Sign in to your account</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-lg-8">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control input-md" id="email" placeholder="Email">
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control input-md" id="password" placeholder="Password">
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox-input mb-10">
                                                <input id="remember" class="styled" type="checkbox">
                                                <label for="remember">
                                                    Remember me
                                                </label>
                                            </div><!-- end checkbox-input -->
                                        </div><!-- end col -->
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <label><a href="forgot-password.html">Forgot Password</a></label>
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="javascript:void(0);" class="btn btn-default round btn-md"><i class="fa fa-lock mr-5"></i> Login</a>
                                        </div>
                                    </div><!-- end form-group -->
                                </form>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
      @endsection()