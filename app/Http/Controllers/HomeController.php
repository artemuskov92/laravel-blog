<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->paginate(3);
        return view('pages.index', compact('posts',));
    }

    /**
     * Single post
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->incrementReadCount();
        return view('pages.show', compact('post'));
    }

    /**
     * Get posts for tags
     */
    public function tag(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->where('status',1)->paginate(3);
        return view('pages.list', compact('posts'));
    }

    /**
     * Get psots for tags
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->where('status',1)->paginate(3);
        return view('pages.list', compact('posts'));
    }
}