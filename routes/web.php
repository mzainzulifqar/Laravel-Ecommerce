<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/empty/cart',function(){

	Cart::instance('saveforlater')->destroy();
});

Route::get('/testing','CartController@testing');


Route::group(['as' => 'main.'],function(){
	Route::get('/','MainController@index');
	Route::get('/Product/{product}','MainController@single_product')->name('single_product');
	Route::get("/product/shop",'MainController@shop')->name('shop');

	// Cart Routes
	Route::get('/cart','CartController@index')->name('cart');
	Route::post('/cart/store','CartController@store')->name('cart.store');
	Route::post('/cart/remove','CartController@destroy')->name('cart.remove');
	Route::post('/cart/saveForLater','CartController@saveForLater')->name('cart.saveForLater');
	Route::post('/cart/movetocart','CartController@movetocart')->name('cart.movetocart');
	Route::post('/cart/remove/save','CartController@removefromsave')->name('cart.removefromsave');
	Route::post('/cart/updateqty','CartController@updateqty')->name('cart.updateqty');
	//Checkout Routes
	Route::get('/checkout','CheckoutController@index')->name('checkout');
	Route::post('/checkout/store','CheckoutController@store')->name('checkout.store');
	//Coupon Routes
	Route::post('/coupon','CheckoutController@add_coupon')->name('add_coupon');
	Route::delete('/coupon','CheckoutController@remove_coupon')->name('remove_coupon');
	//category Routes
	Route::get('/shop','MainController@fetchwithcategory')->name('shop');
});


	Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('login.form');
	Route::post('/login/admin','Auth\AdminLoginController@login')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




	/**
     
     *Admin Routes
     */
Route::group(['as' => 'admin.','middleware' => ['auth:admin'],'prefix' => 'admin'],function(){
	
	Route::get('/dashboard','AdminController@index')->name('dashboard');
	Route::post('/logout','Auth\AdminLoginController@logout')->name('logout');


		// softdelete routes for category
	Route::get('/category/{category}/putIntoTrash','CategoryController@putIntoTrash')->name('category.putIntoTrash');
	Route::get('/category/trash','CategoryController@trash')->name('category.trash');
	Route::get('/category/recover/{id}','CategoryController@recoverFromTrash')->name('category.recover');
	
	// softdelete routes for product
	
	Route::get('/product/{product}/putIntoTrash','ProductController@putIntoTrash')->name('product.putIntoTrash');
	Route::get('/product/trash','ProductController@trash')->name('product.trash');
	Route::get('/product/recover/{id}','ProductController@recoverFromTrash')->name('product.recover');

	//resource controller route
	
	Route::resource('product','ProductController');
	 Route::resource('category','CategoryController');

});
