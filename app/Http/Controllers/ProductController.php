<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\UploadedFile;
use App\Models\Category;
use App\Models\Image;

//use App\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        $data['categories'] = Category::all();
        return view('products.index', ['products' => $products], $data);
    }

    public function show($id)
    {
        $image['image'] = Image::find($id);
        $product = Product::find($id);
        $data['categories'] = Category::find($id)->get()->where('id', $product->category);
        return view('products.show', ['product' => $product], $data, $image);
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

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('img/products', $filename);
            $product->image = $filename;
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
        $product = Product::find($id);
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

    public function products($category)
    {
        $products = Product::where('category', $category)->get();
        $data['categories'] = Category::all();
        return view('products.index', ['products' => $products], $data);
    }

    public function users()
    {

        return $this->belongsTo(User::class, 'id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
}
