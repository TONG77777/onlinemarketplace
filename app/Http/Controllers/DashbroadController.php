<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;



class DashbroadController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        $data['categories'] = Category::all();
        $data['products'] = Product::where('user_id', '=', Auth::user()->id)->where('mark_as_sold', '=', 0)->get();
        $data['soldProducts'] = Product::where('user_id', '=', Auth::user()->id)->where('mark_as_sold', '=', 1)->get();

        return view('dashbroad', $data)->with('status', 'Product has been updated!');
    }
}
