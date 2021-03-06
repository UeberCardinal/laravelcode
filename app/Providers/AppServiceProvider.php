<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get());
            $view->with('popular_category',Category::withCount(['posts'])->orderBy('posts_count', 'desc')->limit(5)->get());
            $view->with('tags', Tag::all());

        });
        view()->composer('posts.index', function ($view) {
            $view->with('posts', Post::with('comments', 'tags', 'category')->orderBy('id', 'desc')->paginate(3));
            $view->with('postjquery', Post::with('comments')->get());
        });





    }
}
