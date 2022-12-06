<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function create($id)
    {
        $order = Order::find($id);
        return view('reviews.create', compact('order'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $review = new Review();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->order_id = $id;
        $review->save();
        return redirect('order')->with('success', 'Review Added');
    }

 

}
