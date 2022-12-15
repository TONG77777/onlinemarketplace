<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;




class OrderController extends Controller
{
    public function adminIndex()
    {
        $users = User::all();
        $products = Product::all();
        $orders = Order::all();
        // $orders = Order::paginate(10);
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
        $data['addresses'] = Address::where('user_id', auth()->user()->id)->get();
        $data['users'] = User::all();
        $data['image'] = Image::all();
        $data['products'] = Product::all();
        $data['order'] = Order::find($id);
        $data['categories'] = Category::all();
        $data['payment'] = Payment::where('order_id', $id)->get();
        $data['review'] = Review::all();
        return view('orders.show', $data);
    }

    public function cancel($id)
    {
        //pending, confirmed, shipping, completed, cancelled
        $order = Order::find($id);
        $order->status = 'cancelled';
        $order->save();
        return redirect('/order')->with('success', 'Your Order has been Cancelled!');
    }

    public function orderCompleted($id)
    {
        //pending, confirmed, shipping, completed, cancelled
        $order = Order::find($id);
        $order->status = 'completed';
        $product = Product::find($order->product_id);
        $product->mark_as_sold = 1;
        $product->save();
        $order->save();
        return redirect('/order')->with('success', 'Your Order has been Completed!');
    }

    public function orderShipping($id)
    {
        //pending, confirmed, shipping, completed, cancelled
        $order = Order::find($id);
        $order->status = 'shipping';
        $order->save();
        return redirect('/dashbroad')->with('success', 'Your Order has been Shipping!');
    }

    public function orderConfirmed($id)
    {
        //pending, confirmed, shipping, completed, cancelled
        $order = Order::find($id);
        $order->status = 'confirmed';
        $order->save();
        return redirect('/dashbroad')->with('success', 'Your Order has been Confirmed!');
    }
}
