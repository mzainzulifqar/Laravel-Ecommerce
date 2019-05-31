
@extends('backend.layouts.app')
@section('content')

     <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="invoice-title">
        <h3 class="pull-right">Order # {{$order->id}}</h3>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <address>
            <strong>From</strong><br>
              {{$order->billing_email}}<br>
              {{$order->billing_address1}}/{{$order->billing_city}}
            </address>
          </div>
          <div class="col-md-6 text-right">
            <address>
              <strong>Address To:</strong><br>
              {{$order->billing_address1}}/{{$order->billing_city}}
            </address>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <address>
              <strong>Payment Method:</strong><br>
              {{$order->billing_payment_gateway}}<br>
              {{$order->billing_email}}
            </address>
          </div>
          <div class="col-md-6 text-right">
            <address>
              <strong>Order Date:</strong><br>
              {{$order->created_at}}<br><br>
            </address>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Order summary</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                 
                   
                  
                                <tr>
                      <td><strong>Item</strong></td>
                      <td class="text-center"><strong>Price</strong></td>
                      <td class="text-center"><strong>Quantity</strong></td>
                      <td class="text-right"><strong>Totals</strong></td>
                                </tr>
               
                </thead>
                <tbody>
                  <!-- foreach ($order->lineItems as $line) or some such thing here -->
                   @foreach($order->product as $p)
                                     <tr>
                    <td>{{$p->title}}</td>
                    <td class="text-center">{{priceFormat($p->price)}}</td>
                    <td class="text-center">{{$p->pivot->quantity}}</td>
                    <td class="text-right">{{priceFormat($p->pivot->quantity * $p->price)}}</td>
                  </tr>
                     @endforeach
                          
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-8">
          <table class="table table-striped">
            <thead>
              
              <tr>
                <th>Discount</th>
                <th>{{priceFormat($order->billing_discount)}}</th>
              </tr>
              <tr>
                <th>Subtotal after Discount</th>
                <th>{{priceFormat($order->billing_subtotal)}}</th>
              </tr>
              <tr>
                <th>Tax</th>
                <th>{{priceFormat($order->billing_tax)}}</th>
              </tr>
              <tr>
                <th>Total</th>
                <th>{{priceFormat($order->billing_total)}}</th>
              </tr>
            
          </table>
        </div>
          
      
    </div>
      
@endsection()

@section('scripts')
  <script>
     function confrimDelete(id){
      let choice = confirm('Are u sure,u want to delete this');
      if(choice)
      {


      document.getElementById('category-form-'+id).submit();
    }
     }
  </script>
@endsection()
