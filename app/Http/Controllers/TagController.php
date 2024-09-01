<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tag;
// use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(){
        $Tags = tag::all();
        return view('admin.Tag.index', ['Tags' => $Tags]);
    }
    public function create(){
        return view('admin.Tag.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $Tag = new tag();
        $Tag->name = $request->name;
        $Tag->save();
        return redirect()->route('Tag');
    }

    public function edit($id){
        // dd($id);
        $Tags = tag::findOrFail($id);
        // dd($Tags);
        return view('admin.Tag.edit', ['Tags' => $Tags]);
    }

    public function update(Request $request, $id){
        $Tags = tag::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $Tags->name = $request->name;
        $Tags->save();
        return redirect()->route("Tag"); 
    }

    public function delete(Request $request, $id){
        $Tags = tag::findOrFail($id);
        $Tags->delete();
        return redirect()->route('Tag');
    }

}
