<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



//products
Route::get('/products','ProductController@index');
Route::get('/products/create','ProductController@create');
Route::post('/products', 'ProductController@store');
Route::get('/products/edit/{id}', 'ProductController@edit');
Route::put('/products/update/{id}', 'ProductController@update');

Route::get('/products/{id}', 'ProductController@show');

Route::delete('/products/{id}', 'ProductController@destroy');


Route::get('/like', function () {
    return view('like');
});


Route::get('seller/edit_item', function () {
    return view('seller/edit_item');
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