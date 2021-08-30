<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $i = 0;
        $posts = Post::with('category', 'tags')->orderBy('id', 'desc')->get();

        return view('posts.index', compact('posts', 'i'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('views');
        $post->update();
        return view('posts.show', compact('post'));
    }
}
