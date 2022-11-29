<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;



class OrderController extends Controller
{
    public function adminIndex()
    {
        $users = User::all();
        $products = Product::all();
        $orders = Order::paginate(10);
        return view('admin.order.index', ['orders' => $orders, 'users' => $users, 'products' => $products]);
    }

    public function adminUpdate(Order $order, $id)
    {
        $order = Order::findOrfail($id);
        if ($order->status == 'completed') {
            return redirect()->route('admin.order.index')->with('success', 'Order already completed');
        }
        $order->status = 'completed';
        $order->update();
        $order->save();
        return redirect()->route('admin.order.index')->with('success', 'Order has been updated');
    }

    public function adminSearch()
    {
        if ($search_text = $_GET['query']) {
            $orders = Order::where('id', 'LIKE', '%' . $search_text . '%')->get();
            $users = User::all();
            $products = Product::all();
            return view('admin.order.index', ['orders' => $orders, 'users' => $users, 'products' => $products]);
        }
    }

    public function adminStatus() //pending, confirmed, shipping, completed, cancelled
    {

        if ($status = $_GET['status'])
            $orders = Order::where('status', $status)->get();
        $users = User::all();
        $products = Product::all();

        if ($orders->isEmpty()) {
            return redirect()->route('admin.order.index')->with('error', 'No order found');
        }
        

        return view('admin.order.index', ['orders' => $orders, 'users' => $users, 'products' => $products]);
    }

    public function update($id, Request $request)
    {
        //pending, confirmed, shipping, completed, cancelled
        $order = Order::find($id);
        $order->status = 'completed';
        $order->save();
        return redirect('/orders')->with('success', 'Order Updated!');
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $address = Address::where('user_id', auth()->user()->id)->first();
        $users = User::all();
        $image['image'] = Image::find($id);
        $products = Product::all();
        $order = Order::find($id);
        $data['categories'] = Category::all();
        return view('orders.show', ['order' => $order, 'users' => $users, 'products' => $products, 'address' => $address], $data, $image);
    }

    public function cancel($id)
    {
        //pending, confirmed, shipping, completed, cancelled
        $order = Order::find($id);
        $order->status = 'cancelled';
        $order->save();
        return redirect('/order')->with('success', 'Your Order has been Cancelled!');
    }
}
