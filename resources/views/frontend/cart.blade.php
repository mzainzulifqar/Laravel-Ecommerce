@extends('frontend.layouts.app')
@section('section')
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>

                            <li class="active">Cart</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        <!-- Use a button to open the snackbar -->
{{-- <div class="se-pre-con"></div> --}}

<!-- The actual snackbar -->
<div id="snackbar">@if(session()->has('message')){{session()->get('message')}}@endif</div>

        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    @include('frontend.partials.sidebar')
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">My Cart</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-20 no-border">

                        <div class="row">
                            <div class="col-sm-12">
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
                                                        <input type="hidden" value="{{$row->id}}" name="id">
                                                        <input type="hidden" value="{{$row->rowId}}" name="rowid">
                                                        <button type="submit" style="border:none;background:none;color:black;"><strong><b>Save for later</b></strong></button>
                                                    </form>

                                                </td>
                                                <td>
                                                    <span>{{$row->model->presentPrice($row->price)}}</span>
                                                </td>
                                                <td>
                                                    <input  id="qty-{{$row->id}}" data="{{$row->rowId}}" type="number" style="width:60%;margin-right:5px;display:inline" min="1" class="form-control qty text-center" value="{{$row->qty}}">
                                                </td>
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
                                <h2 class="text-center">{{Cart::count()}} Item in Cart</h2>
                                    @endif
                                <hr class="spacer-10 no-border">
                              
                                <a href="{{url('/product/shop')}}" class="btn btn-light semi-circle btn-md pull-left">
                                    <i class="fa fa-arrow-left mr-5"></i> Continue shopping
                                </a>

                                @if(Cart::count() > 0)
                                <a href="{{route('main.checkout')}}" class="btn btn-default semi-circle btn-md pull-right">
                                    Checkout <i class="fa fa-arrow-right ml-5"></i>
                                </a>
                                @else

                                @endif

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
            $('document').ready(function(){

                        $('.qty').on('change',function(){

                        var rowId = $(this).attr("data");
                        var qty = $(this).val();
                            $.ajaxSetup({
                              headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                            });
                                 $.ajax({
                    /* the route pointing to the post function */
                    url: '{{url('/cart/updateqty')}}',
                    type: 'ajax',
                    method:"post",
                    /* send the csrf-token and the input to the controller */
                    data:{qty:qty,rowId:rowId},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                       if(data.status == 'success')

                       {
                        window.location.reload();
                        //  window.history.pushState("Details", "Title", "{{url('/')}}");

                        // $("body").load("{{url('/')}}");

                         //  window.location.replace('{{url('/')}}');
                        // location.reload();
                       }
                    }
                });

                                             } );

              /* Update item quantity */

     // $('#qty').on( 'change', function(){ updateqty(); } );
});
          </script>
       @endsection()
