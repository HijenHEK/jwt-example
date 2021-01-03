<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Post::latest()->get() , 200)->header('content-type', 'application/json') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:2'
        ]);
        $post = Post::create([
            'body' => 'required|min:2',
            'user_id' =>  auth()->user()->id
        ]);
        return response($post , 200)->header('content-type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response($post , 200)->header('content-type', 'application/json');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|min:2'
        ]);
        $post->update([
            'body' => 'required|min:2',
            'user_id' =>  auth()->user()->id
        ]);
        return response($post , 200)->header('content-type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response('' , 200)->header('content-type', 'application/json');

    }
}
