@extends('backend.layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
      <h1 class="h2" style="margin-top:12px;">Add Product</h1>
          
          
          
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.product.index')}}">Products</a></li>
            <li class="breadcrumb-item">Add/Edit Products</li>
          </ol>
        </nav>

<h2 class="modal-title">Add/Edit Products</h2>
<form  action="@if(isset($product)) {{route('admin.product.update', $product)}} @else {{route('admin.product.store')}} @endif" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="row">
		@csrf
		@if(isset($product))
		@method('PUT')
		@endif
		<div class="col-lg-9">
			<div class="form-group row">
				<div class="col-sm-12">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
				</div>
				<div class="col-sm-12">
					@if (session()->has('message'))
					<div class="alert alert-success">
						{{session('message')}}
					</div>
					@endif
				</div>
				<div class="col-lg-12">
					<label class="form-control-label">Title: </label>
					<input type="text" id="txttitle" name="title" class="form-control " value="{{@$product->title}}" />
					<p class="small">{{url('/')}}/<span id="url">{{@$product->slug}}</span>
					<input type="hidden" name="slug" id="slug" value="{{@$product->slug}}">
				</p>
			</div>
		</div>
		<div class="form-group row">
			
			<div class="col-lg-12">
				<label class="form-control-label">Description: </label>
				<textarea name="description" id="editor" class="form-control ">{!! @$product->description !!}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-6">
				<label class="form-control-label">Price: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">$</span>
					</div>
					<input type="text" class="form-control" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1" name="price" value="{{@$product->price}}" />
				</div>
			</div>
			<div class="col-6">
				<label class="form-control-label">Discount: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">$</span>
					</div>
					<input type="text" class="form-control" name="discount_price" placeholder="0.00" aria-label="discount_price" aria-describedby="discount" value="{{@$product->discount_price}}" />
				</div>
			</div>
				<div class="col-6">
				<label class="form-control-label">How Much Discount: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">$</span>
					</div>
					<input type="text" class="form-control" name="discount" placeholder="0.00" aria-label="discount_price" aria-describedby="discount" value="{{@$product->discount}}" />
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="card col-sm-12 p-0 mb-2">
				<div class="card-header align-items-center">
					<h5 class="card-title float-left">Extra Options</h5>
					<div class="float-right" >
						<button type="button" id="btn-add" class="btn btn-primary btn-sm">+</button>
						<button type="button" id="btn-remove" class="btn btn-danger btn-sm">-</button>
					</div>
					
				</div>
				<div class="card-body" id="extras">
					<div class='row align-items-center options'><div class='col-md-4'><label class='form-control-label'>Option <span></span></label><input type='text' name='extra[option][]' class='form-control' value='' placeholder='size' />
				</div>				<div class='col-md-8' style='margin-bottom:10px;'><label>Label</label><input type='text' name='extra[values][]' class='form-control' placeholder='option1 | option2 | option3'/><label>Prices</label><input type='text' name='extra[price][]' class='form-control' placeholder='option1 | option2 | option3'/></div></div>

				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<ul class="list-group row">
			<li class="list-group-item active"><h5>Status</h5></li>
			<li class="list-group-item">
				<div class="form-group row">
					<select class="form-control" id="status" name="status">
						<option value="0" @if(isset($product) && $product->status == 0) {{'selected'}} @endif >Pending</option>
						<option value="1" @if(isset($product) && $product->status == 1) {{'selected'}} @endif>Publish</option>
					</select>
				</div>
				<div class="form-group row">
					<div class="col-lg-12">
						@if(isset($product))
						<input type="submit" name="submit" class="btn btn-warning btn-block " value="Update Product" />
						@else
						<input type="submit" name="submit" class="btn btn-success btn-block " value="Add Product" />
						@endif
					</div>
					
				</div>
			</li>
			<li class="list-group-item active"><h5>Feaured Image</h5></li>
			<li class="list-group-item">
				<div class="input-group mb-3">
					<div class="custom-file ">
						<input type="file"  class="custom-file-input" name="thumbnail" id="thumbnail">
						<label class="custom-file-label" for="thumbnail">Choose file</label>
					</div>
				</div>
				<div class="img-thumbnail  text-center">
					<img src="@if(isset($product)) {{asset('public/images/'.$product->thumbnail)}} @else {{asset('public/images/no-image.jpg')}} @endif" id="imgthumbnail" class="img-fluid" alt="">
				</div>
			</li>
			<li class="list-group-item">
				<div class="col-12">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" ><input id="featured" type="checkbox" name="featured" value="@if(isset($product)){{@$product->featured}}@else{{0}}@endif" @if(isset($product) && $product->featured == 1) {{'checked'}} @endif /></span>
						</div>
						<p type="text" class="form-control" name="featured" placeholder="0.00" aria-label="featured" aria-describedby="featured" >Featured Product</p>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" ><input id="exclusive" type="checkbox" name="exclusive" value="@if(isset($product)){{@$product->exclusive}}@else{{0}}@endif" @if(isset($product) && $product->exclusive == 1) {{'checked'}} @endif /></span>
						</div>
						<p type="text" class="form-control" name="featured" placeholder="0.00" aria-label="featured" aria-describedby="featured" >Exclusive Product</p>
					</div>
				</div>
			</li>
			@php
			$ids = (isset($product) && $product->category->count() > 0 ) ? array_pluck($product->category, 'id') : null;
			
			@endphp
			<li class="list-group-item active"><h5>Select Categories</h5></li>
			<li class="list-group-item ">
				<select  class="js-example-placeholder-multiple js-states form-control" multiple="multiple" name="category[]" >
					@if(isset($data) && $data->count() > 0)
					@foreach($data as $d)
					<option value="{{$d->id}}"
						@if(!is_null($ids) && in_array($d->id, $ids))
						{{'selected'}}
						@endif
					>{{$d->name}}</option>
					@endforeach
					@endif
				</select>
			</li>
		</ul>
	</div>
</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
	$(function(){
		
     
		
		
		
$('#thumbnail').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#imgthumbnail").attr('src', image);
});

});
$('#btn-add').on('click', function(e){
	
		var count = $('.options').length+1;
		
			
			$('#extras').append("<div class='row align-items-center options'>"+"<div class='col-md-4'>"+"<label class='form-control-label'>Option <span>"+count+"</span>"+"</label>"+"<input type='text' name='extra[option][]' class='form-control' value='' placeholder='size' />"+
				"</div>"+
				"<div class='col-md-8' style='margin-bottom:10px;'>"+"<label>Label</label>"+"<input type='text' name='extra[values][]' class='form-control' placeholder='option1 | option2 | option3'/>"+"<label>Prices</label>"+
				"<input type='text' name='extra[price][]' class='form-control' placeholder='option1 | option2 | option3'/>"+"</div>"+"</div>");
		
});
$('#btn-remove').on('click', function(e){	
	$('.options:last').remove();
})
$('#featured').on('change', function(){
	if($(this).is(":checked"))
		$(this).val(1)
	else
		$(this).val(0)
});
$('#exclusive').on('change',function(){

	if($(this).is(':checked'))
	{
		$(this).val(1);

	}
	else
	{
		$(this).val(0);
	}
});
})
</script>
@endsection