<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\UploadedFile;
use App\Models\Category;
use App\Models\Counter;
use App\Models\Image;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    //
    public function index()
    {
        //pagnation for products
        $products = Product::with('user', 'categories')->where('mark_as_sold', '==', 1)->paginate(9);
        $data['categories'] = Category::all();
        return view('products.index', ['products' => $products], $data);
    }

    public function show(Product $product)
    {
        $data['images'] = Image::where('product_id', $product->id)->get();
        $data['user'] = $product->user;
        $data['product'] = $product;
        $data['categories'] = Category::all();
        $data['reviews'] = $product->user->products()->with('order.review')->get();
        $user_products = $product->user->products;
        $user_orders = Order::whereIn('product_id', $user_products->pluck('id'))->get();
        $data['reviews'] = Review::whereIn('order_id', $user_orders->pluck('id'))->get();
        //counter
        $data['counter'] = Counter::find($product->id);
        if ($data['counter']) {
            $data['counter']->views = $data['counter']->views + 1;
            $data['counter']->save();
        } else {
            $data['counter'] = Counter::create([
                'id' => $product->id,
                'views' => 1,
            ]);
        }
        //similar products
        $data['similar_products'] = Product::where('category', $product->category)->where('id', '!=', $product->id)->where('mark_as_sold', '=', '0')->take(3)->get();
        return view('products.show', $data);
    }

    public function edit(Product $product, $id)
    {
        $data['categories'] = Category::all();
        $product = Product::find($id);
        return view('products.edit', ['product' => $product], $data);
    }

    public function update(Request $request, Product $product, $id)
    {

        $request->user();

        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100',
            'condition' => 'required',
            'category' => 'required',
            'price' => 'required|numeric|between:0,99999.99',
            'description' => 'required|max:1000',
        ]);

        $product->name = request('name');

 
        if($request->hasFile('image')){
        $images = Image::where('product_id', $id)->get();
        foreach ($images as $image) {
            File::delete('img/products/' . $image->url);
            Image::where('product_id', $id)->delete();
        }

        $image = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('img/products', $name);
                $image[] = $name;
            }
        }

        if ($image) {
            foreach ($image as $img) {
                $image = new Image();
                $image->url = $img;
                $image->product_id = $product->id;
                $image->save();
            }
        }
    }
        $product->condition = request('condition');
        $product->category = request('category');
        $product->price = request('price');
        $product->description = request('description');

        $product->update();
        $product->save();

        return redirect('/products/')->with('success', 'Product Edit Successful!');
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('products.create', $data);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:100',
        //     'condition' => 'required',
        //     'category' => 'required',
        //     'price' => 'required|numeric|between:0,99999.99',
        //     'description' => 'required|max:1000',
        // ]);

        $product = new Product();

        $product->name = request('name');


        $product->condition = request('condition');
        $product->category = request('category');
        $product->price = request('price');
        $product->description = request('description');
        $product->user_id = auth()->user()->id;

        $product->save();

        $image = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('img/products', $name);
                $image[] = $name;
            }
        }


        if ($image) {
            foreach ($image as $img) {
                $image = new Image();
                $image->url = $img;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        return redirect('/products')->with('success', 'Product Added');
    }

    public function destroy($id)
    {
        Image::where('product_id', $id)->delete();
        $product = Product::find($id);
        $image = Image::where('product_id', $id)->get();
        foreach ($image as $img) {
            File::delete('img/products/' . $img->url);
        }
        $product->delete();
        return redirect('/products')->with('success', 'Product Deleted');
    }

    public function search()
    {
        if ($search_text = $_GET['query']) {
            $products = Product::where('name', 'LIKE', '%' . $search_text . '%')->get();
            $data['categories'] = Category::all();
            return view('products.index', ['products' => $products], $data);
        } else {
            return redirect('/products')->with('status', 'No Products Found');
        }
    }

    public function category($id)
    {
        $products = Product::where('category', $id)->paginate(10);
        $data['categories'] = Category::all();
        return view('products.index', ['products' => $products], $data);
    }

    public function markAsSold($id)
    {
        $product = Product::find($id);
        $product->mark_as_sold = 1;
        $product->save();
        return redirect('/dashbroad')->with('success', 'Product Marked as Sold');
    }


    
}
