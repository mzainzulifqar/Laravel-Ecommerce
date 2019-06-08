@extends('frontend.layouts.app')
@section('section')
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Checkout</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
      
        <div id="snackbar">@if(session()->has('message')){{session()->get('message')}}@endif</div>

        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                  @include('frontend.partials.sidebar')
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Checkout</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-20 no-border">


                            <div class="col-sm-12">
                                <ul class="nav nav-pills style2 nav-justified">
                                    <li class="active">
                                        <a href="#shopping-cart" data-toggle="tab">
                                            1. Shopping Cart
                                            <div class="icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#billing-info" data-toggle="tab">
                                            2. Billing Info
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#payment" data-toggle="tab">
                                            3. Payment
                                            <div class="icon">
                                                <i class="fa fa-credit-card"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                 <div class="row">




                                <div class="tab-content pills">
                                    <div class="tab-pane active" id="shopping-cart">
                                       @if(Cart::count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Products</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Cart::content() as $row)

                                            <tr>
                                                <td>
                                                    <a href="{{route('main.single_product',$row->model->slug)}}">
                                                        <img width="60px" src="{{asset('public/images/'.$row->model->thumbnail)}}" alt="product">
                                                    </a>
                                                </td>
                                                <td>
                                                    <h6 class="regular"><a href="{{route('main.single_product',$row->model->slug)}}">{{$row->model->title}}</a></h6>
                                                   <form action="{{route('main.cart.saveForLater')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$row->rowId}}" name="id">
                                                        <button type="submit" style="border:none;background:none;color:black;"><strong><b>Save for later</b></strong></button>
                                                    </form>


                                                </td>
                                                <td>
                                                    <span>{{$row->model->presentPrice($row->price)}}</span>
                                                </td>
                                                <td>
                                                    <span>{{$row->qty}}</span>
                                                <td>
                                                    <span class="text-primary">{{$row->subtotal}}</span>
                                                </td>
                                                <td>
                                            <form  action="{{route('main.cart.remove')}}" method="post">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" value="{{$row->rowId}}" name="id">
                                                        <button type="submit" class="close">×</button>
                                                    </form>

                                                </td>
                                            </tr>

                                           @endforeach()
                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->
                                @else
                                <h2 class="text-center">Cart Is Empty</h2>
                                @endif
                                    </div><!-- end tab-pane -->
                                    <div class="tab-pane" id="billing-info">
                                        <div class="row">

                                            <script src="https://js.stripe.com/v3/"></script>

                                            <form action="{{route('main.checkout.store')}}" method="post" id="payment-form">

                                                @csrf
                                            <div class="col-md-6">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <h5 class="thin subtitle">Billing Address</h5>
                                                <div class="form-group input-group-lg @if($errors->has('country')){{'has-error'}}@endif">
                                                    <select class="form-control" name="country">
                                                        <option value="Kosovo">Kosovo</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Aland Islands">Aland Islands</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                                                        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Curacao">Curacao</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernsey">Guernsey</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libya">Libya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montenegro">Montenegro</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                        <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                        <option value="South Sudan">South Sudan</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Timor-leste">Timor-leste</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                                                        <option value="Viet Nam">Viet Nam</option>
                                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div><!-- end form-group -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group @if($errors->has('name')){{'has-error'}} @endif">
                                                            <input id="name" type="text" placeholder="First Name" name="name" value="{{old('name')}}" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                        @if(Auth()->user())
                                                        <div class="form-group  @if($errors->has('email')){{'has-error'}} @endif">
                                                            <input id="email" type="text" placeholder="Email" name="email" value="{{Auth()->user()->email}}" class="form-control input-md required email" readonly>

                                                        </div><!-- end form-group -->
                                                        @else
                                                         <div class="form-group  @if($errors->has('email')){{'has-error'}} @endif">
                                                            <input id="email" type="text" placeholder="Email" name="email" value="{{old('email')}}" class="form-control input-md required email">

                                                        </div><!-- end form-group -->
                                                        @endif

                                                    </div><!-- end col -->
                                                    <div class="col-sm-6">

                                                        <div class="form-group  @if($errors->has('phone')){{'has-error'}} @endif">
                                                            <input id="phone" type="tel" placeholder="Phone" name="phone" value="{{old('phone')}}" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="form-group  @if($errors->has('billingaddress1')){{'has-error'}} @endif">
                                                    <input id="billingAddress" value="{{old('billingaddress1')}}" type="text" placeholder="Address Line 1" name="billingaddress1" class="form-control input-md required">
                                                </div><!-- end form-group -->
                                                <div class="form-group  @if($errors->has('billingaddress2')){{'has-error'}} @endif">
                                                    <input id="billingAddress2" value="{{old('billingaddress2')}}" type="text" placeholder="Address Line 2" name="billingaddress2" class="form-control input-md required">
                                                </div><!-- end form-group -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group  @if($errors->has('billingcity')){{'has-error'}} @endif">
                                                            <input id="city" type="text" value="{{old('billingcity')}}" placeholder="City" name="billingcity" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                    </div><!-- end col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group  @if($errors->has('billingzip')){{'has-error'}} @endif">
                                                            <input id="zip" type="text" value="{{old('billingzip')}}" placeholder="Zip/Postal Code" name="billingzip" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
                                            </div><!-- end col -->

                                             <div class="col-md-6">
                                                <h5 class="thin subtitle">Shipping Address</h5>
                                                <div class="form-group">
                                                    <div class="checkbox-input checkbox-primary" data-toggle="collapse" data-target=".shipto">
                                                        <input id="ship-to-billing-address" class="styled" type="checkbox" checked>
                                                        <label for="ship-to-billing-address">
                                                            Ship to billing address?
                                                        </label>
                                                    </div><!-- end checkbox-input -->
                                                </div><!-- end form-group -->

                                                <div class="shipto collapse">
                                                    <div class="form-group input-group-lg">
                                                        <select class="form-control" name="shippingcountry">
                                                            <option value="Kosovo">Kosovo</option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Aland Islands">Aland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                                                            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Curacao">Curacao</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libya">Libya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russian Federation">Russian Federation</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                            <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                            <option value="South Sudan">South Sudan</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Timor-leste">Timor-leste</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                                                            <option value="Viet Nam">Viet Nam</option>
                                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div><!-- end form-group -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input id="name" type="text" placeholder="First Name" name="shippingname" class="form-control input-md required">
                                                            </div><!-- end form-group -->

                                                        </div><!-- end col -->
                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <input id="phone" type="tel" placeholder="Phone" name="shippingphone" class="form-control input-md required">
                                                            </div><!-- end form-group -->
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div class="form-group">
                                                        <input id="billingAddress" type="text" placeholder="Address Line 1" name="shippingaddress1" class="form-control input-md required">
                                                    </div><!-- end form-group -->
                                                    <div class="form-group">
                                                        <input id="billingAddress2" type="text" placeholder="Address Line 2" name="shippingaddress2" class="form-control input-md required">
                                                    </div><!-- end form-group -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input id="city" type="text" placeholder="City" name="shippingcity" class="form-control input-md required">
                                                            </div><!-- end form-group -->
                                                        </div><!-- end col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input id="zip" type="text" placeholder="Zip/Postal Code" name="shippingzip" class="form-control input-md required">
                                                            </div><!-- end form-group -->
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                </div><!-- end collapse -->
                                                <div class="form-group">
                                                    <textarea rows="6" class="form-control" placeholder="Notes about yout order"></textarea>
                                                </div><!-- end form-group -->
                                            </div><!-- end col -->



                                            <!-- Add Extra code here  -->
                                            </div><!-- end row -->
                                    </div><!-- end tab-pane -->
                                    <div class="tab-pane" id="payment">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Choose a Payment Method</h5>
                                                <div class="panel-group accordion style2" id="accordionPayment" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment1">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1" aria-expanded="true" aria-controls="collapsePayment1">
                                                                    <i class="fa fa-credit-card mr-10"></i>Credit or Debit Card
                                                                </a>
                                                            </h4><!-- end panel-title -->
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPayment1">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Cardholder Name <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control required" name="cardholder" placeholder="">
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Card Number <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control required" name="cardnumber" placeholder="">
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Payment Types <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <ul class="list list-inline">
                                                                                <li><i class="fa fa-cc-visa fa-2x"></i></li>
                                                                                <li><i class="fa fa-cc-paypal fa-2x"></i></li>
                                                                                <li class="text-primary"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                                                                <li><i class="fa fa-cc-discover fa-2x"></i></li>
                                                                            </ul>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Expiration Date <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="mm" placeholder="MM" class="form-control required">
                                                                                </div><!-- end col -->
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="yy" placeholder="YY" class="form-control required">
                                                                                </div><!-- end col -->
                                                                            </div><!-- end row -->
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">CSC <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="number" placeholder="" class="form-control mb-10 required">
                                                                            <a href="javascript:void(0);">What's this?</a>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-offset-4 col-sm-8">
                                                                            <div class="checkbox-input checkbox-primary mb-10">
                                                                                <input id="save-my-card" class="styled" type="checkbox">
                                                                                <label for="save-my-card">
                                                                                    Save my Card information?
                                                                                </label>
                                                                            </div><!-- end checkbox-input -->
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-offset-4 col-sm-8 text-right">
                                                                            <a href="order-confirmation.html" class="btn btn-default btn-md round">Order <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment2">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment2" aria-expanded="false" aria-controls="collapsePayment2">
                                                                    <i class="fa fa-paypal mr-10"></i>Pay with PayPal
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment2">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="checkbox-input checkbox-primary mb-10">
                                                                        <input id="pay-with-paypal" class="styled" type="checkbox">
                                                                        <label for="pay-with-paypal">
                                                                            <i class="fa fa-cc-paypal mr-5"></i>Checkout with paypal
                                                                        </label>
                                                                    </div><!-- end checkbox-input -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <a href="order-confirmation.html" class="btn btn-default btn-md round">Order <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                                </div><!-- end form-group -->
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->



                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment2">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment3" aria-expanded="false" aria-controls="collapsePayment2">
                                                                    <i class="fa fa-paypal mr-10"></i>Pay with Stripe
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment2">
                                                            <div class="panel-body">
                                                               <div class="form-row">
                                                                    <label for="card-element">
                                                                      Credit or debit card
                                                                    </label>
                                                                    <div id="card-element">
                                                                      <!-- A Stripe Element will be inserted here. -->
                                                                    </div>
                                                                    <!-- Used to display form errors. -->
                                                                    <div id="card-errors" role="alert"></div>
                                                                  </div>
                                                                  <button  id="submit-button" style="margin-top:25px;" type="submit" class="btn btn-default btn-md round">Submit Payment <i class="fa fa-arrow-circle-right ml-5"></i></button>


                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    </form>
                                                </div><!-- end panel-group -->
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Frequently asked questions</h5>
                                                <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionOne">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    What payments methods can I use?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionTwo">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Can I use gift card to pay for my purchase?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionThree">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    How long will it take to get my order?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->
                                                </div><!-- end panel-group -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end tab-pane -->
                                </div><!-- end pills content -->

                                <hr class="spacer-30">

                                <div class="row">

                                    <div class="col-sm-7 text-left">
                                         @if(!Session()->has('coupon'))
                                        <form class="form-inline" method="post" action="{{route("main.add_coupon")}}">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-control input-md" name="coupon" type="text" placeholder="Coupon code">
                                            </div>
                                            <button class="btn btn-default btn-md round" type="submit">Apply</button>
                                        </form>
                                        @else
                                    @endif
                                    </div><!-- end col -->


                                    <div class="col-sm-5">
                                        <div class="table-responsive">
                                            <table class="table no-border">
                                                <tr>
                                                    <th>Cart Subtotal</th>
                                                    <td>$ {{Cart::subtotal()}}</td>
                                                </tr>
                                                @if(Session()->has('coupon'))
                                                 <tr style="border-bottom: 1px solid grey;">
                                                    <th>Coupon ({{Session()->get('coupon')['code']}})
                                                        <form style="display:inline" action="{{route('main.remove_coupon')}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button style="border:none;background:none;color:red;"type='submit'><strong>remove</strong></button>


                                                        </form>

                                                    </th>

                                                    <td>{{priceFormat(Session()->get('coupon')['discount'])}}</td>
                                                     @else
                                                    @endif
                                                </tr>
                                               @if(Session()->has('coupon'))
                                                <tr>
                                                    <th>New Subtotal</th>
                                                    <th>{{priceFormat($newsubtotal)}}</th>
                                                </tr>
                                                @else
                                                @endif
                                                <tr>
                                                    <th>Shipping and Handling</th>
                                                    @php
                                                        $a = Cart::subtotal();
                                                            $b = str_replace( ',', '', $a );

                                                            if( is_numeric( $b ) ) {
                                                                $a = $b;
                                                            }


                                                    @endphp
                                                    <td>@if($a > 100) $100 @else Free Shipping @endif</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax (17%)</th>
                                                    <td>{{priceFormat($newtax)}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Total</th>
                                                    <td>{{priceFormat($newtotal)}}</td>
                                                </tr>
                                            </table><!-- end table -->
                                        </div><!-- end table-responsive -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->

      @endsection()

      @section('scripts')
        <script>
                    // Create a Stripe client.
        var stripe = Stripe('pk_test_QiLz2QluYpDqCQ3NlFr57A2z00aq1S6vM7');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
          base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
              color: '#aab7c4'
            }
          },
          invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
          }
        };

        // Create an instance of the card Element.
        var card = elements.create('card',
            {
                style: style,
                hidePostalCode:true
            });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
          var displayError = document.getElementById('card-errors');
          if (event.error) {
            displayError.textContent = event.error.message;
          } else {
            displayError.textContent = '';
          }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
          event.preventDefault();
          document.getElementById('submit-button').disabled = true;
          stripe.createToken(card).then(function(result) {
            if (result.error) {
              // Inform the user if there was an error.
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;
            } else {
              // Send the token to your server.
              stripeTokenHandler(result.token);
            }
          });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
          // Insert the token ID into the form so it gets submitted to the server
          var form = document.getElementById('payment-form');
          var hiddenInput = document.createElement('input');
          hiddenInput.setAttribute('type', 'hidden');
          hiddenInput.setAttribute('name', 'stripeToken');
          hiddenInput.setAttribute('value', token.id);
          form.appendChild(hiddenInput);

          // Submit the form
          form.submit();
        }
        </script>
      @endsection()
