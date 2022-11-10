<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class DashbroadController extends Controller
{
    public function index()
    {
        $products = Product::with('users')->where('user_id', '=', Auth::user()->id)->get();
        return view('dashbroad', ['products' => $products]);
    }
}
