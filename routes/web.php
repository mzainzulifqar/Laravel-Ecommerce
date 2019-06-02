<?php

use App\Category;

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


Route::get('/testing',function()
 {
 	
});


Route::group(['as' => 'main.'],function(){
	Route::get('/','MainController@index');
	Route::get('/Product/{product}','MainController@single_product')->name('single_product');
	Route::get("/product/shop",'MainController@shop')->name('shop');

	// Cart Routes
	Route::get('/cart','CartController@index')->name('cart');
	Route::post('/cart/store','CartController@store')->name('cart.store');
	Route::post('/cart/remove','CartController@destroy')->name('cart.remove');
	// Wishlist Views
	Route::get('/cart/saveForLater/view','WishlistController@index')->name('cart.saveForLater.view')->middleware('auth:web');
	Route::post('/cart/saveForLater','WishlistController@saveForLater')->name('cart.saveForLater')->middleware('auth:web');
	Route::post('/cart/movetocart','WishlistController@movetocart')->name('cart.movetocart')->middleware('auth:web');
	Route::post('/cart/remove/save','WishlistController@removefromsave')->name('cart.removefromsave')->middleware('auth:web');

	Route::post('/cart/updateqty','CartController@updateqty')->name('cart.updateqty');
	//Checkout Routes
	Route::get('/checkout','CheckoutController@index')->name('checkout')->middleware('auth');
	Route::get('/confirmation','CheckoutController@confirmation')->name('confirmation');
	Route::get('/guestcheckout','CheckoutController@index')->name('guestcheckout');
	Route::post('/checkout/store','CheckoutController@store')->name('checkout.store');
	//Coupon Routes
	Route::post('/coupon','CheckoutController@add_coupon')->name('add_coupon');
	Route::delete('/coupon','CheckoutController@remove_coupon')->name('remove_coupon');
	//category Routes
	Route::get('/shop','MainController@fetchwithcategory')->name('shop');
	// Search Routes
	Route::get('/search','MainController@search')->name('search');
});


	Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('login.form');
	Route::post('/login/admin','Auth\AdminLoginController@login')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
     
     *User Routes
     */
Route::group(['as' => 'user.','middleware' => ['auth:web'],'prefix' => 'user'],function(){
	Route::get('/order_list','UserController@order_list')->name('order_list');
	
});

	/**
     
     *Admin Routes
     */
Route::group(['as' => 'admin.','middleware' => ['auth:admin'],'prefix' => 'admin'],function(){
	
	Route::get('/dashboard','AdminController@index')->name('dashboard');
	Route::post('/logout','Auth\AdminLoginController@logout')->name('logout');

	//orders routes
	Route::get('/orders','OrderController@index')->name('order.list');
	Route::get('/orders/details/{order}','OrderController@create')->name('order.details');
	Route::delete('/orders/delete/{order}','OrderController@destroy')->name('order.destroy');
	Route::get('/orders/status/{order}/{value}','OrderController@update')->name('order.update');


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
