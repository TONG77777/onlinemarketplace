<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', ['orders' => $orders]);
    }


    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.orders.show', ['order' => $order]);
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.orders.create', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'status' => 'required',
            'amount_to_pay' => 'required',
            'user_id' => 'required',
        ]);

        $order = new Order([
            'product_id' => $request->get('product_id'),
            'status' => $request->get('status'),
            'amount_to_pay' => $request->get('amount_to_pay'),
            'user_id' => $request->auth()->user()->id,
        ]);
        $order->save();
        return redirect('/orders')->with('success', 'Order Created!');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit', ['order' => $order]);

    }

    public function update($id, Request $request){
        $order = Order::find($id);
        $order->product_id = $request->get('product_id');
        $order->status = $request->get('status');
        $order->amount_to_pay = $request->get('amount_to_pay');
        $order->user_id = auth()->user()->id;
        $order->save();
        return redirect('/orders')->with('success', 'Order Updated!');
    }

}
