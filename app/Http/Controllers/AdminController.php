<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role_as == '1') {
            $users = DB::table('users')->get();
            return view('admin/index', compact('users'));
        } else {
            return redirect('/home')->with('error', 'You are not authorized to access this page');
        }
    }

    public function dashboard(){
        $category = DB::table('categories')->count();
        $product = DB::table('products')->count();
        $order = DB::table('orders')->count();
        $user = DB::table('users')->where('role_as', '!=', '1')->count();
        $admin = DB::table('users')->where('role_as', '==', '1')->count();
        return view('admin.dashboard.index', compact('category', 'product', 'order', 'user', 'admin'));
    }

    public function users(){
        $users = DB::table('users')->where('role_as', '!=', '1')->get();
        return view('admin.users.index', compact('users'));
    }

    public function admins(){
        $admins = DB::table('users')->where('role_as', '!=', '0' )->get();
        return view('admin.admins.index', compact('admins'));
    }

    public function products(){

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function payments(){
        $payments = DB::table('payments')->get();
        return view('admin.payments.index', compact('payments'));
    }
}
