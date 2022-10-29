<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

// Route::get('/product/{id}', function ($id) {
//     return view('detail', ['id'=>$id]);
// });

// Route::get('/product', function () {
//     return view('product');
// });

// Route::get('/detail', function () {
//     return view('detail');
// });

Route::get('/products','ProductController@index');
Route::get('/products/create','ProductController@create');
Route::post('/products', 'ProductController@store');
Route::get('/products/{id}', 'ProductController@show');


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