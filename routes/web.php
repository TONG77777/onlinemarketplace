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
Route::get('/products','ProductController@index');
Route::get('/products/create','ProductController@create')->name('seller.products.create')->middleware('auth');
Route::post('/products', 'ProductController@store');
Route::get('/products/edit/{id}', 'ProductController@edit')->name('seller.products.edit')->middleware('auth');
Route::put('/products/update/{id}', 'ProductController@update')->name('seller.products.update')->middleware('auth');
Route::get('/products/{id}', 'ProductController@show');
Route::delete('/products/{id}', 'ProductController@destroy')->middleware('auth');

// Route::get('/like','ProductController@index');

//Dashbroad
Route::get('/dashbroad', 'DashbroadController@index');

Route::get('/like', function (Product $product) {
    $products = Product::all();
        return view('like', ['products' => $products]);
});


Route::get('/address', function () {
    return view('address');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/seller_view', function () {
    return view('seller_view');
});

Route::get('payment', function () {
    return view('payment');
});