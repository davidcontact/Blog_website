<?php

namespace App\Http\Controllers;

// use App\Models\view;
use App\Models\category;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Models\view;

class CategoryController extends Controller
{
    public function index(){
        $categories = category::all();
        // dd($categories);
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        // dd($request->all());
        $category = new category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category');
    }

    public function edit($id){
        // dd("Edit Category", $id);
        $category = category::findOrFail($id);
        // dd($category);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id){
        // dd("update Success", $id);
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $category = category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category');
    }
    public function delete(Request $request, $id){
        // dd("Delete Success", $id);
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('category');
    }

}
