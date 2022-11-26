<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function adminIndex()
    {
        $users = User::all();
        $products = Product::all();
        $orders = Order::all();
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

    public function update($id, Request $request)
    {
        $order = Order::find($id);
        $order->status = 'paid';
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
        $products = Product::all();
        $order = Order::where('id', $id)->where('user_id', auth()->user()->id)->get();
        return view('orders.show', ['orders' => $order, 'users' => $users, 'products' => $products, 'address' => $address]);
    }
}
