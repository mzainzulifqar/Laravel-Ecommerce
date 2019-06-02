<?php

namespace App\Http\Controllers;

use App\Category;
use App\Coupon;
use App\Http\Requests\CheckoutRequest;
use App\Mail\VerifyOrder;
use App\Order;
use App\OrderProduct;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

        if(Cart::content()->count() <= 0)
        {
            return redirect('/');
        }
        else if(Auth::user() && request()->is('guestcheckout'))
        
        {
            return back();
        }

        
        $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->get();

         $product = Product::where('featured','=',1)->take(3)->inRandomOrder()->get();
        return view('frontend.checkout')->with(
            [
                'category' => $category,
                'discount' => $this->getNumber()->get('discount'),
                'newsubtotal' => $this->getNumber()->get('newsubtotal'),
                'newtax' => $this->getNumber()->get('newtax'),
                'newtotal' => $this->getNumber()->get('newtotal'),
                'product' => $product
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
        $newtotal = $newsubtotal + $newtax;

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
        // dd($request->all());
            
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

              
                   $order = $this->addToOrderTables($request,null);
                   Mail::to($order->billing_email)->send(new VerifyOrder($order));
                    Cart::destroy();
                    Session()->forget('coupon');
                    Session()->put('order_check',1);
                    return redirect('/confirmation')->with('message','Payment and Order Successfully Placed');
            
        }

             catch (\Stripe\Error\Base $e) {
                 $this->addToOrderTables($request,$e->getMessage());
                 return back()->with('message',$e->getMessage());
                }         
                
                       
    }

    public function confirmation(){
        if(Session()->get('order_check') == 1)
        {
               $category = Category::whereHas('greatgrandfather',function($query){
              $query->where('parent_id','=',0);
                        })->get();
               Session()->forget('order_check');
                return view('frontend.order-confirmation',compact('category'));

                }
                else{
                    return redirect('/');
                }  

                  }

    protected function addToOrderTables($request ,$error)
    {
         $order = Order::create([
                        'user_id' => auth()->user() ? auth()->user()->id : 0,
                        'billing_email' => $request->email,
                        'billing_name' => $request->name,
                        'billing_address1' => $request->billingaddress1,
                        'billing_address2' => $request->billingaddress2,
                        'billing_city' => $request->billingcity,
                        'country' => $request->country,
                        'billing_postal_code' => $request->billingzip,
                        'billing_phone' => $request->phone,
                        'billing_discount' => $this->getNumber()->get('discount'),
                        'billing_discount_code'=> Session()->get('coupon')['code'] ? Session()->get('coupon')['code'] : null, 
                        'billing_subtotal' => $this->getNumber()->get('newsubtotal'),
                        'billing_tax' =>$this->getNumber()->get('newtax'),
                        'billing_total' => $this->getNumber()->get('newtotal'),
                        'error' =>$error,
               ]);

                   
                        foreach(Cart::content() as $item)
                        {
                           $result =  OrderProduct::create([
                                'order_id' => $order->id,
                                'product_id' => $item->id,
                                'quantity' => $item->qty
                            ]);
                         }
                  return $order;
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

