@extends('frontend.layouts.app')
@section('section')
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                       
                            <li class="active">Login or Register</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                   
                    <!-- end sidebar -->
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Authentication</h2>
                                 @if ($errors->has('email') || $errors->has('password'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('email') }}</strong><br>
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                             
                                                
                                            
                               
                                    
                                
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="subtitle">Login</h5>
                                <form  method="POST" action="{{ route('login') }}">
                                      @csrf
                                    <div class="form-group">
                                        <label for="loginEmail">Email address</label>
                                        <input type="email" class="form-control   input-md {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="loginEmail" placeholder="Email Address" autofocus>

                                          

                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <label for="loginPassword">Password</label>
                                        <input type="password" class="form-control input-md {{ $errors->has('password') ? ' is-invalid' : '' }}" id="loginPassword" name="password" placeholder="Password">
                                       
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="checkbox-input mb-10">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Remember me 
                                        </div><!-- end checkbox-input -->
                                    </div><!-- end form-group -->
                                    <div class="form-group">

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-default round btn-md"><i class="fa fa-lock mr-5"></i> Login</button>
                                        <a href="{{route('main.guestcheckout')}}"" class="btn btn-info round btn-md"><i class="fa fa-lock mr-5"></i> Continue as Guest</a>
                                    </div><!-- end form-group -->

                                </form><!-- end form -->
                            </div><!-- end col -->
                            <div class="col-sm-6">
                                <h5 class="subtitle">Create an account</h5>
                                <form method="POST" action="{{ route('register') }}">
                                      @csrf
                                    <div class="form-group">
                                        <label for="registerName">Name</label>
                                        <input type="text" name="name" class="form-control input-md {{ $errors->has('name') ? ' is-invalid' : '' }}" id="registerName" placeholder="Name" value="{{ old('name') }}" autofocus>
                                      @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <label for="registerEmail">Email address</label>
                                        <input type="email" name="email" class="form-control input-md {{ $errors->has('email') ? ' is-invalid' : '' }}" id="registerEmail" placeholder="Email Address" value="{{ old('email') }}">
                                       
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <label for="registerPassword">Password</label>
                                        <input type="password"  name="password"  class="form-control input-md {{ $errors->has('password') ? ' is-invalid' : '' }}" id="registerPassword" placeholder="Password">
                                  
                                    </div><!-- end form-group -->
                                     <div class="form-group">
                                        <label for="registerPassword">Confirm Password</label>
                                        <input type="password" class="form-control input-md" id="registerPassword" name="password_confirmation" placeholder="Password">
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <button  type="submit" class="btn btn-default round btn-md"><i class="fa fa-user mr-5"></i> Register</button>
                                    </div><!-- end form-group -->
                                </form><!-- end form -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
       @endsection()