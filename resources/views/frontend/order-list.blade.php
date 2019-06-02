@extends('frontend.layouts.app')
@section('section')        
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Order List</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                   @include('frontend.partials.sidebar')
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">My Order</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            
                            @if(isset($data))
                            <div class="col-sm-12">
                                <div class="table-responsive">    
                                    <table class="table table-striped">
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                             
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $d)
                                            @foreach($d->order as $o)
                                            <tr>
                                                <td>
                                                    #{{$o->id}}
                                                </td>
                                             
                                                <td>
                                                    <span>{{priceFormat($o->billing_total)}}</span>
                                                </td>
                                                <td>
                                                    {{$o->created_at}}
                                                </td>
                                                <td>
                                                    <span class="label @if($o->status == 'Awaiting')label-primary @elseif($o->status == 'cancel') label-danger @elseif($o->status == 'Disable')label-warning @elseif($o->status == 'pending')label-info @elseif($o->status == 'Delieverd')label-success @endif">{{$o->status}}</span>
                                                </td>
                                            </tr>
                                           @endforeach
                                           @endforeach
                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->
                                
                                <hr class="spacer-10 no-border">
                                
                                <a href="{{url('/')}}" class="btn btn-light semi-circle btn-md">
                                    <i class="fa fa-arrow-left mr-5"></i> Shopping
                                </a>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                    @else
                    <h2>No Orders</h2>
                    @endif
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
        @endsection()