<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Posts';
        $data['q'] = $request->get('q');
        $data['posts'] = Post::where('post_title', 'like', '%' . $data['q'] . '%')->get();
        return view('post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add Post';
        return view('post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);
        $image_path = $request->file('image')->store('image', 'public');


        $post = new Post();
        $post->post_title = $request->post_title;
        $post->description = $request->description;
        $post->image = $image_path;

        // $post = new Post($request->all());
        $post->save();
        return redirect('post')->with('success', 'Post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data['title'] = 'Posts';
        $data['q'] = $request->get('q');
        $data['posts'] = Post::where('post_title', 'like', '%' . $data['q'] . '%')->get();
        return view('post.home', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $data['title'] = 'Edit Post';
        $data['post'] = $post;
        return view('post.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'post_title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $post->post_title = $request->post_title;
        $post->description = $request->description;
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
            $post->image = $image_path;
        }
        $post->save();
        return redirect('post')->with('success', 'Post updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('post')->with('success', 'Post deleted successfully');
    }
}
