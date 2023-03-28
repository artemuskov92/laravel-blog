<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('admin.posts.create', [
            'category' => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimeter' => '',
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'image' => 'nullable|image',
            'description'=>'required'
        ]);
        $post = Post::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setTags($request->get('tags'));
        $post->setCategory($request->get('category'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        return redirect()->route('posts.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.posts.edit', [
            'category' => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimeter' => '',
            'tags' => Tag::all(),
            'post' => Post::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'image' => 'nullable|image',
            'description'=> 'required'
        ]);
        $post->edit($request->all());
        $post->uploadImage($request->file('image'));
        $post->setTags($request->get('tags'));
        $post->setCategory($request->get('category'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->remove();
        return redirect()->route('posts.index');
    }
}