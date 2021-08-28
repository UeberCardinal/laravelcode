@extends('layouts.layout')

@section('banner')
    <div class="main-banner header-text">
        <div class="container-fluid">
            <div class="owl-banner owl-carousel">
                @foreach($posts as $post)
                <div style="background: #000;" class="item">
                        <img style="opacity: 0.7" src="{{$post->getImage()}}" alt="">
                    <div class="item-content">
                        <div class="main-content">
                            <div class="meta-category">
                                <span>{{$post->tag}}</span>
                            </div>
                            <a href="post-details.html"><h4>{{$post->title}}</h4></a>
                            <ul class="post-info">
                                <li><a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></li>
                                <li><a href="#">{{$post->created_at}}</a></li>
                                <li><a href="#">12 Comments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-lg-8">
        <div class="all-blog-posts">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-12">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <img src="{{$post->getImage()}}" alt="">
                            </div>
                            <div class="down-content">
                                <span>{{$post->category->title}}</span>
                                <a href="post-details.html"><h4>{{$post->title}}</h4></a>
                                <ul class="post-info">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="#">{{$post->created_at}}</a></li>
                                    <li><a href="#">12 Comments</a></li>
                                </ul>
                                {!! $post->description !!}
                                <div class="post-options">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="post-tags">
                                                <li><i class="fa fa-tags"></i></li>

                                                @foreach($post->tags as $key => $tag)
                                                    <li>
                                                        <a href="#">{{$tag->title}}</a>
                                                        @if($key + 1 != count($post->tags))
                                                            ,
                                                    </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="post-share">
                                                <li><i class="fa fa-share-alt"></i></li>
                                                <li><a href="#">Facebook</a>,</li>
                                                <li><a href="#"> Twitter</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="main-button">
                        <a href="blog.html">View All Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection