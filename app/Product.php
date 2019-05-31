<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
   use SoftDeletes;
   use SearchableTrait;
   use Searchable;



       /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'title';
    }

     /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.title' => 10,
            'products.slug' => 5,
            'products.description' => 2,
         
        ],
      
    ];

   protected $guarded = [];

   public function category(){
  
   	return $this->belongsToMany('App\Category','category_products');
   }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $extraFields = [
          'category' => $this->category()->pluck('name')->toArray()
        ];


        return array_merge($array,$extraFields);
    }

   public function getRouteKeyName(){
  
   	return 'slug';
   }
	
  	public function presentPrice($value) {
  
      return '$' . number_format($value);
  	}

   
}
