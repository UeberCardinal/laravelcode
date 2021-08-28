<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $i = 0;
        $posts = Post::all();

        return view('posts.index', compact('posts', 'i'));
    }

    public function show()
    {
        return view('posts.show');
    }
}
