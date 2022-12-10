<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function dashboard()
    {

        //Bar chart for product category
        $categories = Category::all();
        $bar_x = [];
        $bar_y = [];
        foreach ($categories as $key => $category) {
            $bar_x[] = $category->name;
            $bar_y[] = Product::where('category', $category->id)->count();
        }

        $category = DB::table('categories')->count();
        $product = DB::table('products')->count();
        $order = DB::table('orders')->count();
        $user = DB::table('users')->where('role_as', '!=', '1')->count();
        $admin = DB::table('users')->where('role_as', 1)->count();
        $payment = DB::table('payments')->count();

        //Payment status chart //success, failed, pending with color
        $dou_x = ['Success', 'Failed', 'Pending'];
        $dou_y = [Payment::where('status', 'success')->count(), Payment::where('status', 'failed')->count(), Payment::where('status', 'pending')->count()];
        $dou_color = ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 205, 86, 0.2)'];

        //Order status chart //pending, confirmed, shipping, completed, cancelled\
        $pie_x = ['Pending', 'Confirmed', 'Shipping', 'Completed', 'Cancelled'];
        $pie_y = [Order::where('status', 'pending')->count(), Order::where('status', 'confirmed')->count(), Order::where('status', 'shipping')->count(), Order::where('status', 'completed')->count(), Order::where('status', 'cancelled')->count()];

        $data = User::select('id', 'created_at')->get()->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('F'); // grouping by months
        });
        $month = [];
        $monthCount = [];
        foreach ($data as $key => $value) {
            $month[] = $key;
            $monthCount[] = count($value);
        }
        return view(
            'admin.dashboard.index',
            compact('category', 'product', 'order', 'user', 'admin', 'payment'),
            ['data' => $data, 'month' => $month, 'monthCount' => $monthCount, 
            'bar_x' => $bar_x, 'bar_y' => $bar_y, 'dou_x' => $dou_x, 'dou_y' => $dou_y, 
            'dou_color' => $dou_color, 'pie_x' => $pie_x, 'pie_y' => $pie_y]
        );
    }

    public function users()
    {
        $users = DB::table('users')->where('role_as', '!=', '1')->get();
        return view('admin.users.index', compact('users'));
    }

    public function admins()
    {
        $admins = DB::table('users')->where('role_as', '!=', '0')->get();
        return view('admin.admins.index', compact('admins'));
    }

    public function products()
    {

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function payments()
    {
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }
}
