<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\UploadedFile;

//use App\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        // $products = Product::orderBy('image','name', 'price')->get();
        return view('products.index', ['products' => $products]);
    }
    
    public function show($id){
        $product = Product::find($id);
        return view('products.show',['product'=>$product]);
    }

    public function edit(Product $product, $id){
        $product = Product::find($id);
        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request, Product $product, $id){

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

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('img/products',$filename);
            $product->image = $filename;
        }
       
        $product->condition = request('condition');
        $product->category = request('category');
        $product->price = request('price');
        $product->description = request('description');

        $product->update();
        $product->save();
    
        return redirect('/products/')->with('success','Product Edit Successful!');
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){

       
        // $request->validate([
        //     'name' => 'required|max:100',
        //     'condition' => 'required',
        //     'category' => 'required',
        //     'price' => 'required|numeric|between:0,99999.99',
        //     'description' => 'required|max:1000',
        // ]);

        $product = new Product();

        $product->name = request('name');

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('img/products',$filename);
            $product->image = $filename;
        }
       
        $product->condition = request('condition');
        $product->category = request('category');
        $product->price = request('price');
        $product->description = request('description');

        $product->save();
    
        return redirect('/products')->with('success','Product Added');
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('success','Product Deleted');;
    }

    // public function search($name)
    // {
    //     return Product::where('name','like','%'.$name.'%')->get();
    // }
}
