<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\UploadedFile;
use App\Models\Category;
use App\Models\Counter;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    //
    public function index()
    {
        //pagnation for products
        $products = Product::with('users', 'categories')->paginate(10);
        $data['categories'] = Category::all();
        return view('products.index', ['products' => $products], $data);
    }

    public function show($id)
    {
        $image['image'] = Image::find($id);
        $product = Product::find($id);
        $data['categories'] = Category::all();
        //counter
        $counter = Counter::where('id', $id)->first();
        if ($counter) {
            $counter->views = $counter->views + 1;
            $counter->save();
        } else {
            $counter = new Counter();
            $counter->id = $id;
            $counter->views = 1;
            $counter->save();
        }

        return view('products.show', ['product' => $product], $data, $image, $counter);
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



        if ($request->hasFile('images')) {
            Image::where('product_id', $id)->delete();
            $image = Image::where('product_id', $id)->get();
            foreach ($image as $img) {
                $file_path = 'img/products/' . $img->url;
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
            }
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
