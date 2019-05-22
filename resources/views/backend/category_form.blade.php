
@extends('backend.layouts.app')
@section('content')
  

     <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
      <h1 class="h2" style="margin-top:12px;">Add Category</h1>
          
          
          
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.category.index')}}">Category</a></li>
            <li class="breadcrumb-item">Add/Edit Categorys</li>
          </ol>
        </nav>
          @if(Session('message'))
        <div class="alert alert-success">
          {{session('message')}}
        </div>
        @endif
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
         
            
     

      
        
      </div>


     
    <div class="row">
      <div class="col-md-12">
        
<form  action=" @if(isset($category)) {{route('admin.category.update',$category->id)}} @else {{route('admin.category.store')}}    @endif" method="post">
       
          @if(isset($category))
          @method('PUT')
          @endif

          @csrf
          <div class="form-group">
            <label for="email">Title</label>
            <input type="text" class="form-control" name="title" id="txttitle" value="{{@$category->name}}">
            <p>{{url("/")}}/<span id="url">{{@$category->slug}}</span></p>
            <br>
            @if($errors->has('title'))<span class="text-danger">{{$errors->first('title')}}</span>@endif
              <br>
            @if($errors->has('slug'))<span class="text-danger">{{$errors->first('slug')}}</span>@endif
            
              <br>
            @if($errors->has('category'))<span class="text-danger">{{$errors->first('category')}}</span>@endif
            
          </div>
          <input type="hidden" name="slug" id="slug" value="{{@$category->slug}}">
          <div class="form-group">
            <label for="pwd">Description</label>
             <textarea  id="editor" name="desc" value="">{!!@$category->description!!}</textarea>
          </div>
          <div class="form-group">
            <label for="">Parent Category</label>
            <br>
            @php  
                $ids = (isset($category) && $category->parent->count() > 0 ) ? array_pluck($category->parent,'id') : null;
                // dd($ids);

               
            @endphp
            <select  class="js-example-placeholder-multiple js-states form-control" multiple="multiple" style="width: 100%" name="category[]" >
              
              Select A Parent Category
              @if(isset($data))
              <option value="0">Top</option>
              @foreach($data as $cat)
               <option value="{{$cat->id}}" 
                @if(!is_null($ids) && in_array($cat->id,$ids)){{'selected' }} @endif> {{$cat->name}}</option>
               @endforeach
               @endif
            </select>
          </div>
          
          @if(isset($category))
          <button type="submit" class="btn btn-info">Edit</button>
          @else
          <button type="submit" class="btn btn-info">Add</button>
          @endif
        </form>
       

          
               
     
  
      </div>

    </div>
  
     
    </main>
  </div>

</div>

@endsection()
