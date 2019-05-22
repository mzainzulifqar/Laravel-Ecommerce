<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateProduct;
use Illuminate\Support\Facades\Storage;
use App\Cart;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::paginate(5);
        return view('backend.product',compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('backend.add_product',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProduct $request){


        
        $extension = '.'.$request->thumbnail->getClientOriginalExtension();
        $name = time().$extension;
        $request->thumbnail->move(public_path('images'),$name);

        $result = Product::create([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
               'discount' => ($request->get('discount')) ? $request->get('discount') : 0,
            'discount_price' => ($request->get('discount_price')) ? $request->get('discount_price'):0,
            'option' => isset($request->extra) ? json_encode($request->extra) : null,
            'status' => ($request->get('status')) ? $request->get('status'):0,
            'featured' => ($request->get('featured')) ? $request->get('featured'):0,
              'exclusive' => ($request->get('exclusive')) ? $request->get('exclusive'):0,
            'thumbnail' => $name,


        ]);

        if($result)
        {
            $result->category()->attach($request->category);
            return back()->with('message','Product Added Successfully');
        }
        else
        {
            return back()->with('message','Product Cannot Be Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
           // dd(Session::get('cart'));
           $product = Product::all();
             $ex = Product::where('exclusive','=',1)->get()->toArray();

             $weekly_product = Product::where('created_at','>',Carbon::now()->startofWeek())->where('created_at','<',Carbon::now()->endofWeek())->get();
        return view('frontend.index',compact('product','ex','weekly_product'));

       
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       
         $data = Category::all();
        return view('backend.add_product',['data' => $data,'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->has('thumbnail'))
        {
             $extension = '.'.$request->thumbnail->getClientOriginalExtension();
             $name = time().$extension;
             $request->thumbnail->move(public_path('images'),$name);
             $product->thumbnail = $name;
        }

            $product->title = $request->get('title');
            $product->slug = $request->get('slug');
            $product->description = $request->get('description');
            $product->price = $request->get('price');
            $product->discount_price = ($request->get('discount_price')) ? $request->get('discount_price'):0;
            $product->discount = ($request->get('discount')) ? $request->get('discount') : 0;
            $product->status = ($request->get('status')) ? $request->get('status'):0;
            $product->featured = ($request->get('featured')) ? $request->get('featured'):0;
            $product->exclusive = ($request->get('exclusive')) ? $request->get('exclusive'):0;
            
            //detach previous category
            $product->category()->detach();
           

            if($product->save())
            {
                 //attach new category
                $product->category()->attach($request->category);
                return redirect('admin/product')->with('message','Product Updated Successfully');
            }
            else
            {

                return redirect('admin/product')->with('message','Product Updated Un-Successfully');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->forceDelete() && $product->category()->detach())
        {

            Storage::delete($product->thumbnail);
          
            return back()->with('message','Product Deleted Successfully');
        }
        else
        {
            return back()->with('message','Product Cannot be Deleted Successfully');
        }
    }

    public function putIntoTrash(Product $product)
    {
        
        if($product->delete())
        {

             return back()->with('message','Product Trashed Successfully');
        }
        else
        {
            return back()->with('message','Product Cannot be Trashed !Error');
        }
    }

    public function trash()
    {
        $data = Product::onlyTrashed()->paginate(5);
        return view('backend.trashed_product',compact('data'));
    }
    public function recoverFromTrash($id)
    {
        $data = Product::onlyTrashed()->findOrFail($id);
         if($data->restore())
        {

             return back()->with('message','Product Restored Successfully');
        }
        else
        {
            return back()->with('message','Product Cannot be Restored !Error');
        }

    }

    //for frontend

    public function single_product(Product $product){
           
        $weekly_product = Product::where('created_at','>',Carbon::now()->startofWeek())->where('created_at','<',Carbon::now()->endofWeek())->get();
        
                    return view('frontend.single-product',compact('product','weekly_product'));
    }   

}
