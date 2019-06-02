<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
    
       $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->get();
    	$product = Product::inRandomOrder()->take(8)->get();

      	
    	return view('frontend.index',compact('product','category','ex'))->with('message','Hey Ther I am Toast');
    }

    public function single_product(Product $product)
    {   
        
       $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->get();
    	$data = Product::where('slug','!=',$product->slug)->inRandomOrder()->take(8)->get();
    	return view('frontend.shop-single-product',compact('product','data','category'));
    }

    public function shop(){
       
       $category  = Category::whereHas('greatgrandfather',function($query){
                $query->where('parent_id',0);
        })->get();
    	// $product = Product::inRandomOrder()->take(12)->get();
    	return view('frontend.shop',compact('product','category'));
    }


    public function search(Request $request){
      $this->validate($request,[
          'query' => 'required|min:3',
        ]);
      $q = $request->input('query');

      $product = Product::search($q)->paginate(12);
      
      $category = Category::whereHas('greatgrandfather',function($query)
      {
          $query->where("parent_id",'=',0);
      })->get();
        return view('frontend.search',compact('category','product'));
    }


    public function fetchwithcategory(Request $request){
        $cat = '';
       
       
        if($request->category)

        { 
            $category  = Category::whereHas('greatgrandfather',function($query){
           $query->where('parent_id',0); })->get();
           $product = Product::whereHas('category',function($query)
           {    
        
                    $query->where('slug',request()->category);
               });
               $categoryName = request()->category;
        }


   if($request->sortby == 'low_to_high')
   {

            $product = $product->orderBy('Price')->paginate(12);
    }
       else
     {
            $product = $product->orderBy('price','DESC')->paginate(12);
       }
       return view('frontend.category',compact('product','category','categoryName'));
    }
}



