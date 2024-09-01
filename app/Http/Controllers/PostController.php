<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\view;
use App\Models\category;
use App\Models\tag;
use App\Models\post;


class PostController extends Controller
{
    public function index(){
        $post = post::all();
        // dd($post);
        return view('admin.post.index', ['post' => $post]);
    }
    public function create(){
        $category = category::all();
        $tag = tag::all();
        return view('admin.post.create', ['tag' => $tag, 'category' => $category]);
    }

    public function store(Request $request){
        // dd($request->all());
        // $validated = $request->validate([
        //     'title' => 'required|max:255',
        //     'content' => 'required',
        //     'category' => 'required|exists:view,id',
        // ]);
        $requestData = $request->all();
        // dd($requestData);
        $filename = time().$request->file('thumbnail')->getClientOriginalName();
        $Path = $request->file('thumbnail')->storeAs(
            'images',
            $filename,
            'public',
        );
        $requestData["thumbnail"] = '/storage/'.$Path;
        // dd($requestData["thumbnail"]);
        // dd($request->title, $request->content, $request->tags, $request->category );
        $post = new post();
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->tag = $request->tags;
        $post->photo = $requestData["thumbnail"];
        // dd($post->user_id);
        // dd($requestData["thumbnail"]);
        $post->save();
        return redirect()->route('Post');
    }

    public function edit($id){
        // // dd($id);
        $posts = post::findOrFail($id);
        // // dd($posts);
        $post1 = category::all();
        $tag = tag::all();

        return view('admin.post.edit', ['posts' => $posts, 'post1' => $post1, 'tag' => $tag]);
    }

    public function update(Request $request, $id){
        // dd("test");
        $posts = post::findOrFail($id);
        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        // ]);
        
        $posts->title = $request->title;
        $posts->user_id = auth()->id();
        $posts->content = $request->content;
        $posts->category_id = $request->category;
        $posts->tag = $request->tags;
        // dd($posts->tag);
        $posts->save();
        return redirect()->route("Post"); 
    }

    public function delete(Request $request, $id){
        $posts = post::findOrFail($id);
        $posts->delete();
        return redirect()->route('Post');
    }
}
