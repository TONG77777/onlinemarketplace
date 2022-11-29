<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;







class CheckoutController extends Controller
{

    public function checkout($id)
    {
        $product = Product::find($id);
        return view('payment.checkout', compact('product'));
    }

    public function placeorder(Request $request, $id)
    {

        $product = Product::find($id);
        $address = new Address();
        $address->title = request('title');
        $address->receiver_name = request('receiver_name');
        $address->receiver_contact = request('receiver_contact');
        $address->email = request('email');
        $address->address = request('address');
        $address->city = request('city');
        $address->state = request('state');
        $address->postal_code = request('postal_code');
        $address->user_id = Auth::user()->id;
        $address->save();

        $order = Order::create([
            'product_id' => $product->id,
            'status' => 'pending',
            'amount_to_pay' => $product->price,
            'shipping_fee' => request('shipping_fee'),
            'user_id' => Auth::user()->id,
        ]);

        //when order create auto trigger mark as sold to 1
        $product = Product::find($id);
        $product->mark_as_sold = 1;
        $product->update();
        $product->save();

        return view('payment.form', ['order' => $order->id])->with('success', 'Order successfully.');
        // return view('/payment/form', ['order' => $order])->with('success', 'Order Placed Successfully, Complete Payment to Confirm Order');
    }

}
