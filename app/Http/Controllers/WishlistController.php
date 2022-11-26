<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('/wishlist', compact('wishlist'));
    }

    public function store($id)
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            if (empty($wishlist)) {
                $wishlist = new Wishlist();
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $id;
                $wishlist->save();
                return redirect()->back()->with('success', 'Product added to wishlist');
            } else {
                return redirect()->back()->with('success', 'Product already in wishlist');
            }
        } else {
            return redirect()->back()->with('success', 'Please login to add wishlist');
        }
    }
    
    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist successfully!');
    }
}
