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

Route::get('/product', function () {
    return view('product');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/like', function () {
    return view('like');
});

Route::get('/add_item', function () {
    return view('add_item');
});

Route::get('/address', function () {
    return view('address');
});

Route::get('/chat', function () {
    return view('chat');
});