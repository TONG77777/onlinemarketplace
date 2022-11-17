<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
  //
  public function form()
  {
    return view('payment.form');
  }

  public function makePayment(Request $request)
  {
    $input = $request->all();


    \Stripe\Stripe::setApiKey('sk_test_51M51nyFaj0TxPMzIrMoy0fNdUdKsKy0pxzozHVvnqXZy5dkx1if9HkvmAAXsm7QWYAhUTHqxyiaPArBy5IEBUb6A006nVhrJxt');

    $charge = \Stripe\Charge::create([
      'source' => $_POST['stripeToken'],
      'amount' => 2000,
      'currency' => 'myr',
    ]);

    
    if ($charge->status == 'succeeded') {
      return redirect()->route('payment.form')->with('success', 'Payment successfully.');
    }
  }
}
