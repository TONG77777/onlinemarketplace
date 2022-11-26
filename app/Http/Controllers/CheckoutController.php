<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class CheckoutController extends Controller
{
    public function checkout($id)
    {

        $product = Product::find($id);
        return view('payment.checkout', compact('product'));
    }

    public function placeorder(Request $request)
    {


        $validator = Validator::make(
            $request->all(),

            [
                'title' => 'required|max:100',
                'receiver_name' => 'required|max:100',
                'receiver_contact' => 'required|max:12',
                'email' => 'required|email',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'postal_code' => 'required|numeric|digits:5',
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        

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

        Order::create([
            'product_id' => request('product_id'),
            'status' => 'pending',
            'amount_to_pay' => request('amount_to_pay'),
            'shipping_fee' => request('shipping_fee'),
            'user_id' => Auth::user()->id,
        ]);


        return view('/payment/form')->with('success', 'Order Placed Successfully, Complete Payment to Confirm Order');
    }
}
