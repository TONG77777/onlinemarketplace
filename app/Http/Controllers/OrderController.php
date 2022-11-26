<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    // public function index()
    // {
    //     $orders = Order::all();
    //     return view('admin.orders.index', ['orders' => $orders]);
    // }

    public function index(){
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('orders.index', compact('orders'));
    }

    public function show($id){
        $order = Order::where('id', $id)->where('user_id', auth()->user()->id)->get();
        return view('orders.show', compact('orders'));
    }




    // public function show($id)
    // {
    //     $order = Order::find($id);
    //     return view('admin.orders.show', ['order' => $order]);
    // }

    

    public function update($id, Request $request){
        $order = Order::find($id);
        $order->status = 'paid';
        $order->save();
        return redirect('/orders')->with('success', 'Order Updated!');
    }

}
