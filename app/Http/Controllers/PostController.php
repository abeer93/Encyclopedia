<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all();
        if($request->ajax()){
            return view('posts/list')->with(compact('posts'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts/create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loggedUser = Auth::user();
        if($request->get('category') == 0) {
            return redirect('/post/create')->with('danger', 'Must choose category');
        }
        $post = new Post();
        $post->title       = $request->get('title');
        $post->description = $request->get('content');
        $post->category_id = $request->get('category');
        $post->author_id   = $loggedUser->id;
        $post->save();
        return redirect('/category')->with('success', 'Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $post = Post::findOrFail($id);
        if($request->ajax()){
            return response::json($post);
        } else {
            $author = $post->author()->get();
            return view('posts/post-data')->with(compact('post', 'author'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $post = Post::findOrFail($id);
            $post->title       = $request->get('title');
            $post->description = $request->get('content');
            $post->update();
            return response::json('Post has been edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/category')->with('success','Post has been  deleted');
    }
}
