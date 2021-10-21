<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {


        return view('posts.index');
    }

    public function show($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('views');
        $post->update();
        $comments = Comment::with('post')->where('post_id', $post->id)->get();
        return view('posts.show', compact('post', 'comments'));
    }

    public function comment(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'comment' => 'required',
        ]);
        $post = Post::where('slug', $request->slug)->pluck('id');
        $post_id = ['post_id' => $post[0]];
        $arr = $request->all() + $post_id;
        $comm = Comment::create($arr);
        return redirect()->back()->with('success', 'Комментарий добавлен');

    }


}
