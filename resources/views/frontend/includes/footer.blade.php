   
        <!-- start footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-truck text-gray"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="alt-font text-light text-uppercase">Free Shipping</h6>
                                <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-life-ring text-gray"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="alt-font text-light text-uppercase">Support 24/7</h6>
                                <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-gift text-gray"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="alt-font text-light text-uppercase">Gift cards</h6>
                                <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-credit-card text-gray"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="alt-font text-light text-uppercase">Payment 100% Secure</h6>
                                <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-30">
                
                <div class="row">
                    <div class="col-sm-3">
                        <h5 class="title">Plus</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit, libero a molestie consectetur, sapien elit lacinia mi.</p>
                        
                        <hr class="spacer-10 no-border">
                        
                        <ul class="social-icons">
                            <li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="dribbble"><a href="javascript:void(0);"><i class="fa fa-dribbble"></i></a></li>
                            <li class="linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                            <li class="youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></li>
                            <li class="behance"><a href="javascript:void(0);"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <h5 class="title">My Account</h5>
                        <ul class="list alt-list">
                            <li><a href="my-account.html"><i class="fa fa-angle-right"></i>My Account</a></li>
                            <li><a href="wishlist.html"><i class="fa fa-angle-right"></i>Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-angle-right"></i>My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-angle-right"></i>Checkout</a></li>
                        </ul>
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <h5 class="title">Information</h5>
                        <ul class="list alt-list">
                            <li><a href="about-us-v1.html"><i class="fa fa-angle-right"></i>About Us</a></li>
                            <li><a href="faq.html"><i class="fa fa-angle-right"></i>FAQ</a></li>
                            <li><a href="privacy-policy.html"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>
                            <li><a href="contact-v1.html"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                        </ul>
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <h5 class="title">Payment Methods</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <ul class="list list-inline">
                            <li class="text-white"><i class="fa fa-cc-visa fa-2x"></i></li>
                            <li class="text-white"><i class="fa fa-cc-paypal fa-2x"></i></li>
                            <li class="text-white"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                            <li class="text-white"><i class="fa fa-cc-discover fa-2x"></i></li>
                        </ul>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-30">
                
                <div class="row text-center">
                    <div class="col-sm-12">
                        <p class="text-sm" style="color:white;font-size:15px;">&COPY; {{currentyear()}}. Made with <i class="fa fa-heart text-danger"></i> by Zain Zulifqar.</p>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </footer>
        <!-- end footer -->
        
        
        <!-- JavaScript Files -->
         @yield('scripts')
        <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
        <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

        <script src="{{asset('public/js/algolia.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('public/theme/js/jquery-3.1.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/jquery.downCount.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/nouislider.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/jquery.sticky.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/pace.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/star-rating.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/wow.min.js')}}"></script>
  
        <script type="text/javascript" src="{{asset('public/theme/js/swiper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/theme/js/main.js')}}"></script>
         <script>
        
                 

        //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $('document').ready(function(){

         
            // Animate loader off screen
        $(".se-pre-con").delay(2000).fadeOut("slow");
       
           @if(session()->has('message'))
            
            
                  var delay = 3000;
                setTimeout(function() {
                    var x = document.getElementById("snackbar");

            // Add the "show" class to DIV
            x.className = "show";


            // After 3 seconds, remove the show class from DIV
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                
                }, delay);
        @endif
     
      @if($errors->any())
            
            
                  var delay = 3000;
                setTimeout(function() {
                    var x = document.getElementById("snackbar");

            // Add the "show" class to DIV
            x.className = "show";


            // After 3 seconds, remove the show class from DIV
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                
                }, delay);
        @endif
     


    });
    
            </script>
       
        
    </body>

<!-- Mirrored from diamantgjota.com/themes/plus-v1.3.0/home-v5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 May 2019 13:11:01 GMT -->
</html>