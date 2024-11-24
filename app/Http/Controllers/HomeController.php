<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;


class HomeController extends Controller
{
    public function index(Request $request){
        // dd("test");
        $posts = post::when($request->category_id, function($query, $category_id){
            $query->where('category_id', $category_id);
        })->when($request->tag, function($query, $tag){
            $query->where('tag', $tag);
        })->when($request->search, function($query, $search){
            $query->where('title', 'LIKE', '%'.$search.'%');
        })->paginate(2)->withQueryString();

        return view('index', ['posts' => $posts]);
    }

    public function readMore(Request $request, $id){
        $post = post::findOrFail($id);
        // dd($post);
        return view('blog', ['post' => $post]);
    }
}
