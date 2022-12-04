<?php

use App\Events\HelloEvent;
use App\Http\Controllers\AdminController;
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

//Admin Dashboard
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    //Dashboard
    Route::get('/', 'AdminController@index')->name('admin.index');
    //categories
    Route::get('category', 'CategoryController@index')->name('admin.category.index');
    Route::get('category/create', 'CategoryController@create')->name('admin.category.create')->middleware('auth');
    Route::post('category', 'CategoryController@store');
    Route::get('category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit')->middleware('auth');
    Route::put('category/update/{id}', 'CategoryController@update')->name('admin.category.update')->middleware('auth');
    Route::delete('category/{id}', 'CategoryController@destroy')->middleware('auth');
    //Order 
    Route::get('order', 'OrderController@adminIndex')->name('admin.order.index')->middleware('auth');
    Route::get('/update/{id}', 'OrderController@adminUpdate')->name('admin.order.update')->middleware('auth');
    Route::get('/search', 'OrderController@adminSearch')->name('admin.order.search')->middleware('auth');
    Route::get('/status', 'OrderController@adminStatus')->name('admin.order.status')->middleware('auth');
    //Dashboard
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard.index')->middleware('auth');
    //Users List
    Route::get('users', 'AdminController@users')->name('admin.users.index')->middleware('auth');
    //Admins List
    Route::get('admins', 'AdminController@admins')->name('admin.admins.index')->middleware('auth');
    //Products List
    Route::get('products', 'AdminController@products')->name('admin.products.index')->middleware('auth');
    //Payments List
    Route::get('payments', 'AdminController@payments')->name('admin.payments.index')->middleware('auth');
});


//Products
Route::get('/products', 'ProductController@index')->name('products.index')->middleware('auth');
Route::get('/products/create', 'ProductController@create')->name('seller.products.create')->middleware('auth');
Route::post('/products', 'ProductController@store')->middleware('auth');
Route::get('/markAsSold/{id}', 'ProductController@markAsSold')->name('seller.products.markAsSold')->middleware('auth');
Route::get('/products/edit/{id}', 'ProductController@edit')->name('seller.products.edit')->middleware('auth');
Route::put('/products/update/{id}', 'ProductController@update')->name('seller.products.update')->middleware('auth');
Route::get('/products/{id}', 'ProductController@show')->middleware('auth')->name('products.show');
Route::delete('/products/{id}', 'ProductController@destroy')->name('seller.products.delete')->middleware('auth');
Route::get('/search', 'ProductController@search')->middleware('auth');
Route::get('/category/{id}', 'ProductController@category')->middleware('auth');


//Dashbroad
Route::get('/dashbroad', 'DashbroadController@index')->name('dashbroad.index')->middleware('auth');

//Wishlist
Route::get('/wishlist', 'WishlistController@index')->middleware('auth');
Route::post('/wishlist/store/{id}', 'WishlistController@store')->name('wishlist.store')->middleware('auth');
Route::delete('/wishlist/{id}', 'WishlistController@destroy')->middleware('auth')->name('wishlist.destroy');


//Checkout
Route::post('/payment/checkout/{id}', 'CheckoutController@checkout')->name('checkout.store')->middleware('auth');
Route::post('/payment/placeorder/{id}', 'CheckoutController@placeorder')->name('place.order')->middleware('auth');

//Payment
Route::get('/payment/form/{id}', 'StripePaymentController@form')->name('payment.form')->middleware('auth');
Route::post('/payment/form/{id}', 'StripePaymentController@makePayment')->name('make.payment')->middleware('auth');

//Order
Route::get('/order', 'OrderController@index')->name('order.index')->middleware('auth');

Route::get('/cancel/{id}', 'OrderController@cancel')->name('order.cancel')->middleware('auth');
Route::get('/order/update/{id}', 'OrderController@orderCompleted')->name('order.completed')->middleware('auth');
Route::get('/shipping/{id}', 'OrderController@orderShipping')->name('order.shipping')->middleware('auth');
Route::get('/confrim/{id}', 'OrderController@orderConfirmed')->name('order.confrim')->middleware('auth');
Route::get('/order/{id}', 'OrderController@show')->name('order.show')->middleware('auth');

//Reviews Product
Route::post('/reviews/{id}', 'ReviewController@create')->name('reviews.create')->middleware('auth');
Route::post('/review/{id}', 'ReviewController@store')->name('review.store')->middleware('auth');


// Route::get('/admin/charts', function () {
//    return view('admin.charts');
// });
