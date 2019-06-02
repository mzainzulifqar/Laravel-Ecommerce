
@extends('backend.layouts.app')
@section('css')
  <style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 10000000000000000;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
  </style>
@endsection()
@section('content')


     <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Category</h1>

        
      </div>


      <div class="col-md-12">
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-md-12">
        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add Category</a>
         <a href="{{route('admin.category.trash')}}" class="btn btn-primary">View Trash</a>
         </div>
         </div>
        @if(Session('message'))
        <div class="alert alert-success">
          {{session('message')}}
        </div>
        @endif
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
          </ol>
        </nav>
      </div>
      

     
     <div class="col-md-12">
      <div class="table table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>

              <th>#</th>
              <th>User Id</th>
              <th>Email</th>
              <th>Tax</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
              @if(isset($order) && !empty($order->error))<th>Error</th>@else @endif
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($order))
            @foreach($order as $o)
            <tr>
              <td>{{$o->id}}</td>
              <td>{{($o->billing_name)}}</td>
              <td>{{$o->billing_name}}</td>
              <td>{{priceFormat($o->billing_tax)}}</td>
              <td>{{priceFormat($o->billing_total)}}</td>
              <td>{{$o->status}}</td>
                 <td> 
                   <div class="dropdown">
                    <button class="dropbtn">Dropdown</button>
                    <div class="dropdown-content">
                      <a href="{{route('admin.order.update',['order'=>$o->id,'value'=>'pending'])}}">Pending</a>
                      <a href="{{route('admin.order.update',['order'=>$o->id,'value'=>'cancel'])}}">Cancel</a>
                      <a href="{{route('admin.order.update',['order'=>$o->id,'value'=>'Awaiting'])}}">Awaiting</a>
                      <a href="{{route('admin.order.update',['order'=>$o->id,'value'=>'Disable'])}}">Disable</a>
                      <a href="{{route('admin.order.update',['order'=>$o->id,'value'=>'Delieverd'])}}">Delieverd</a>
                    </div>
                  </div>
                    
                </td>
              @if(!empty($o->error))<td>{{$o->error}}</td>@else @endif
          
                <td><a class="btn btn-info btn-sm" href="{{route('admin.order.details',$o->id)}}">View Details</a> | <a class="btn btn-danger btn-sm" href="javascript:" onclick="confrimDelete('{{$o->id}}')">Delete</a>
                   <form id="category-form-{{$o->id}}" action="{{ route('admin.order.destroy',$o->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                      
                                         
            </tr>
            @endforeach
            @else
            {{'No data Found'}}
            @endif

          </tbody>
        </table>
        {{$order->links()}}
      </div>
    </div>
    </main>
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
