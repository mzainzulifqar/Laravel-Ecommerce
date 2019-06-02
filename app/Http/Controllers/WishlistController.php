<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->get();
             $user = new User;
        
        $data = 
            DB::table('wishlists')->where('user_id',auth::user()->id)
            ->join('products', 'products.id', '=', 'wishlists.product_id')->get();
        
        return view('frontend.wishlist',compact('category','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
   
   public function saveForLater(Request $request)
    {
        // dd($request->rowid);
        // dd(Cart::instance('default')->content());
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

             Cart::instance('default')->remove($request->rowid);
            Cart::instance('saveforlater')->add($item->id,$item->name,1,$item->price)->associate('App\Product');

            foreach(Cart::instance('saveforlater')->content() as $pp)
            {
                Wishlist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->id,

                ]);
            }
            Cart::instance('saveforlater')->destroy();
          return back()->with('message','Iten has been moved to Save for later');
      }
    }


     public function movetocart(Request $request)
    {
      // dd(removeComaDollar($request->dd_price));


 
        $duplicate  = Cart::instance('default')->search( function ($cartItem) use ($request)
        {

            return $cartItem->id === $request->id;
        });
           
        if($duplicate->isNotEmpty())
        {
            return back()->with('message','Already in Cart');
        }
        else
        {



        Cart::instance('default')->add($request->id,$request->name,1,removeComaDollar($request->dd_price))->associate('App\Product');
          $response = Wishlist::where('product_id',$request->id)->first();
            $response->delete();


        return redirect('/cart')->with('message','Product moved to cart');
    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
