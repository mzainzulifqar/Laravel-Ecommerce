<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
	use SoftDeletes;
	protected $guarded = [];

    public function parent(){
    	return $this->belongsToMany(Category::class,'category_parents','category_id','parent_id');
    }

    public function children(){
    	return $this->belongsToMany(Category::class,'category_parents','parent_id','category_id');
    }

    public function product()
    {
    	return $this->belongsToMany('App\Product','category_products');
    }

      public function greatgrandfather()
      {
         return $this->belongsToMany(Category::class,'category_parents');
      }


}
