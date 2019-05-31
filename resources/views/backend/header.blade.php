
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>

    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/"> --}}

    <!-- Bootstrap core CSS -->
    
  <link rel="stylesheet" type="text/css" href="{{asset('public/theme/admin.css')}}" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="{{asset('public/theme/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/theme/custom.css')}}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 --}}     <!-- Custom styles for this template -->
    

    <link rel="stylesheet" href="{{asset('public/theme/plugin/dist/css/select2.min.css')}}">




@yield('css')
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      
       <a class="nav-link" href="#" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out') }}
                                    </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link @if(request()->url() == route('admin.dashboard')) {{'active'}}@endif" href="{{route('admin.dashboard')}}">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(request()->url() == route('admin.order.list')) {{'active'}}@endif" href="{{route('admin.order.list')}}">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
           <li class="nav-item">
            
            <a class="nav-link @if(request()->url() == route('admin.category.index')) {{'active'}}@endif" href="{{route('admin.category.index')}}">
              <span data-feather="bar-chart-2"></span>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  @if(request()->url() == route('admin.product.index')) {{'active'}}@endif" href="{{route('admin.product.index')}}">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    
