<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Payout;
use Stripe\Stripe;





class StripePaymentController extends Controller
{

  public function order()
  {
    return $this->belongsTo(Order::class);
  }

  public function makePayment(Request $request, $order_id)
  {
    $order = Order::find($order_id);
    if (!$order) {
      return redirect()->back();
    }

    $total = $order->amount_to_pay + $order->shipping_fee;

    $payment = Payment::create([
      'order_id' => $order->id,
      'status' => 'pending',
      'amount' => $total,
      'user_id' => $order->user_id,
    ]);

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    $charge = \Stripe\Charge::create([
      'source' => $_POST['stripeToken'],
      'amount' => $total * 100,
      'currency' => 'myr',
    ]);

    if ($charge->status == 'succeeded') {
      $payment->status = 'success';
      $payment->save();
      return redirect('/order')->with('success', 'Payment successfully.');
    } elseif ($charge->status == 'failed') {
      $payment->status = 'failed';
      $payment->save();
      return redirect('/order')->with('error', 'Payment failed.');
    }
  }
}
