<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $category = Category::all();
       $product = Product::where('featured','=',1)->take(3)->inRandomOrder()->get();
       
    
        return view('frontend.cart',compact('category','product'));        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duplicate  = Cart::search( function($cartItem,$rowId) use ($request){
                return  $cartItem->id === $request->id;
        } );

        if($duplicate->isNotEmpty())
        {

        return redirect()->to('/cart')->with('message','Item Already Exist');
         
        }
        else
        {
            Cart::add($request->id,$request->name,1,$request->dd_price, ['size' => 'large'])->associate('App\Product');
            // dd(Cart::content());
            return redirect()->to('/cart')->with('message','Item added to cart Successfully');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request)
    {

        
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateqty (Request $request)
    {

        Cart::instance('default')->update($request->rowId, $request->qty); // Will update the quantity
      $response = array(
          'status' => 'success',
         
      );
      $request->session()->flash('message', 'Quantity Updated Successfully');
      return response()->json($response);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $result = Cart::remove($request->id);

            return back()->with('message','Item has been removed Successfully');
        
    }

    public function saveForLater(Request $request)
    {
        $item  = Cart::instance('default')->get($request->rowid);
       // dd($item);
        $duplicate = Cart::instance('saveforlater')->search(function($cartItem,$rowId) use ($request)
        {
            return $cartItem->id === $request->id;
        });
       // dd($duplicate);
        if($duplicate->isNotEmpty())
        {
            return back()->with('message','Already Exist in Save for later');
        }
        else
        {

             Cart::instance('default')->remove($request->id);
            Cart::instance('saveforlater')->add($item->id,$item->name,1,$item->price)->associate('App\Product');
          return back()->with('message','Iten has been moved to Save for later');
      }
    }

    public function testing()
    {  
             // dd(Cart::instance('default')->content());
             // dd(Cart::instance('saveforlater')->content());
        return view('frontend.testing');
    }

   

    

    public function removefromsave(Request $request)
    {
        // dd($request->id);
        Cart::instance('saveforlater')->remove($request->id);
        return back();
    }

}
