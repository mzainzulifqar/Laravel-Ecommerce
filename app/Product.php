<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
   use SoftDeletes;

   protected $guarded = [];

   public function category(){
  
   	return $this->belongsToMany('App\Category','category_products');
   }

   public function getRouteKeyName(){
  
   	return 'slug';
   }
	
  	public function presentPrice($value) {
  
      return '$' . number_format($value);
  	}

   
}
