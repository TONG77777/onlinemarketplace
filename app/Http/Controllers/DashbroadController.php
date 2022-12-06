<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class DashbroadController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data['categories'] = Category::all();
        $products = Product::with('user')->where('user_id', '=', Auth::user()->id)->where('mark_as_sold', '=', '0')->get();

        return view('dashbroad', ['products' => $products], $data)->with('status', 'Product has been updated!');
    }
}
