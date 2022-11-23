<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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


//Authentication
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//Products
Route::get('/products', 'ProductController@index');
Route::get('/products/create', 'ProductController@create')->name('seller.products.create')->middleware('auth');
Route::post('/products', 'ProductController@store');
Route::get('/products/edit/{id}', 'ProductController@edit')->name('seller.products.edit')->middleware('auth');
Route::put('/products/update/{id}', 'ProductController@update')->name('seller.products.update')->middleware('auth');
Route::get('/products/{id}', 'ProductController@show');
Route::delete('/products/{id}', 'ProductController@destroy')->middleware('auth');
Route::get('/search','ProductController@search')->middleware('auth');

//category
Route::get('admin/category', 'CategoryController@index');
Route::get('admin/category/create', 'CategoryController@create')->name('admin.category.create')->middleware('auth');
Route::post('admin/category', 'CategoryController@store');
Route::get('admin/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit')->middleware('auth');
Route::put('admin/category/update/{id}', 'CategoryController@update')->name('admin.category.update')->middleware('auth');
Route::delete('admin/category/{id}', 'CategoryController@destroy')->middleware('auth');

//Order 
Route::get('/admin/order', 'OrderController@index')->name('admin.order.index')->middleware('auth');
Route::get('/admin/order/create', 'OrderController@create')->name('admin.order.create')->middleware('auth');
Route::post('/admin/order', 'OrderController@store')->name('admin.order.store')->middleware('auth');
Route::get('/admin/order/{id}', 'OrderController@show')->name('admin.order.show')->middleware('auth');
Route::get('/admin/order/edit/{id}', 'OrderController@edit')->name('admin.order.edit')->middleware('auth');
Route::put('/admin/order/update/{id}', 'OrderController@update')->name('admin.order.update')->middleware('auth');

//Dashbroad
Route::get('/dashbroad', 'DashbroadController@index')->name('dashbroad.index')->middleware('auth');

//Wishlist
Route::get('/wishlist', 'WishlistController@index')->middleware('auth');
Route::post('/wishlist/store/{id}', 'WishlistController@store')->name('wishlist.store')->middleware('auth');
Route::delete('/wishlist/{id}', 'WishlistController@destroy')->middleware('auth')->name('wishlist.destroy');

//Payment & Checkout
Route::get('/payment/create', 'AddressController@create')->name('payment.create')->middleware('auth');
Route::post('/payment/create', 'AddressController@store');

//Payment
Route::get('/payment/form', 'StripePaymentController@form')->name('payment.form');
Route::post('/payment/form', 'StripePaymentController@makePayment')->name('make.payment');


//Chat
Route::get('/chat', function () {
    return view('chat');
});


Route::get('admin', function () {
    return view('admin.index');
});


// Route::get('admin/order', function () {
//     return view('admin.order.index');
// });
