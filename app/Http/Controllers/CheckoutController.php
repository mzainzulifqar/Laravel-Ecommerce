<?php

namespace App\Http\Controllers;

use App\Category;
use App\Coupon;
use App\Http\Requests\CheckoutRequest;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;


class CheckoutController extends Controller
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
        return view('frontend.checkout')->with(
            [
                'category' => $category,
                'discount' => $this->getNumber()->get('discount'),
                'newsubtotal' => $this->getNumber()->get('newsubtotal'),
                'newtax' => $this->getNumber()->get('newtax'),
                'newtotal' => $this->getNumber()->get('newtotal'),
            ]);
    


    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function getNumber()
    {
        $tax = config('cart.tax') / 100;
        $discount = Session()->get('coupon')['discount'] ?? 0;
        $newsubtotal = oldformat(Cart::subtotal()) - $discount;
        $newtax  = $newsubtotal * $tax;
        $newtotal = $newsubtotal +$newtax;

        return collect([
                    'discount' => $discount,
                    'newsubtotal' => $newsubtotal,
                    'newtax' => $newtax,
                    'newtotal' => $newtotal,
        
        
                ]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
            
                    $charge = '';
            $error = '';
            $success = '';
            $a  = Cart::total();
            $a = str_replace(',','',$a);
          $contents = Cart::content()->map(function($item)
          {
            return $item->model->slug.",".$item->qty;
          })->values()->toJson();

             Stripe::setApiKey("sk_test_ETic4Vi9kUpP7d4Ayd4nVzxx00bEJ5vOJS");
            try {
             
                $charge = Charge::create([
                    'amount' => $this->getNumber()->get('newtotal')*100 ?? oldformat(Cart::total()) * 100,
                    'currency' => 'usd',
                    'source' => $request->stripeToken,
                    'receipt_email' => $request->email,
                     'metadata' => [
                        'contents' => $contents,
                        'quantity' => Cart::instance('default')->count(),
                        'discount' => collect(Session()->get('coupon')['discount'])->toJson(),
                    ],
                ]);
            }

             catch (\Stripe\Error\Base $e) {
                // echo $e->getMessage();  
                 return back()->with('message',$e->getMessage());
                } catch (Exception $e) {
                  // Catch any other non-Stripe exceptions
                    echo "whoops";
                }
                // dd($charge);


                if($charge)
                {

                    Cart::destroy();
                    Session()->forget('coupon');
                    return back()->with('message','Payment Successful');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // Coupon function

    public function add_coupon(Request $request)
    {
        $coupon = Coupon::where('code',$request->coupon)->first();

        if(!$coupon)
        {
            return back()->with("message",'Coupon Code is Invalid');
        }

            // dd($coupon->discount(oldformat(Cart::subtotal())));

        Session()->put('coupon',[
            'code' => $request->coupon,
            'discount' => $coupon->discount(oldformat(Cart::subtotal()))
        ]);

        return back()->with('message','Coupon Applied Successfully');
    }


    public function remove_coupon(){

        Session()->forget('coupon');
        return back()->with('message','Coupon Remove Successfully');
    }


 }

