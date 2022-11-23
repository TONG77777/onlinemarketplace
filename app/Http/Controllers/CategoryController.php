<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('admin/category.index', ['category' => $category]);
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = request('name');
        $category->description = request('description');

        $category->save();

        $category->user_id = auth()->user()->id;
        return redirect('admin/category')->with('success', 'Category Added');
    }

    public function edit(Category $category, $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category, $id)
    {

        $request->user();

        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:1000',
        ]);

        $category->name = request('name');
        $category->description = request('description');

        $category->update();
        $category->save();

        return redirect('admin/category')->with('success', 'Category Update Successful!');
    }

    public function destroy(Category $category, $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category')->with('success', 'Category Deleted');
    }

    public function show(Category $category, $id)
    {
        $category = Category::find($id);
        return view('admin.category.show', ['category' => $category]);
    }
    
}
