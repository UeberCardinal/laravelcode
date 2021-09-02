
@extends('layouts.layout')

@section('title', 'Stand Blog :: Home' )



@section('banner')

    <div class="main-banner header-text">
        <div class="container-fluid">
            <div class="owl-banner owl-carousel">

                @foreach($postjquery as $post)
                <div style="background: #000;" class="item">
                        <img src="{{$post->getImage()}}" alt="">
                    <div class="item-content">
                        <div class="main-content">
                            <div class="meta-category">
                                <span>{{$post->tag}}</span>
                            </div>
                            <a href="{{route('posts.single', ['slug' => $post->slug])}}"><h4>{{$post->title}}</h4></a>
                            <ul class="post-info">
                                <li><a href="#">Admin</a></li>
                                <li><a href="#">{{$post->getPostDate()}}</a></li>
                                <li><a href=""><i class="fa fa-eye"></i> {{$post->views}}</li></a>
                                <li><a href="#"><i class="fa fa-comment"></i> {{$post->comments->count()}} </a></li>
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
                                <a href="{{route('categories.single', ['slug' => $post->category->slug])}}"><span>{{$post->category->title}}</span></a>
                                <a href="{{route('posts.single', ['slug' => $post->slug])}}"><h4>{{$post->title}}</h4></a>
                                <ul class="post-info">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="">{{$post->getPostDate()}}</a></li>
                                   <li><a href=""><i class="fa fa-eye"></i> {{$post->views}}</a></li>
                                    <li><a href="#"><i class="fa fa-comment"></i> {{$post->comments->count()}} </a></li>
                                </ul>
                                {!! $post->description !!}
                                <div class="post-options">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="post-tags">
                                                @if($post->tags->count())

                                                <li><i class="fa fa-tags"></i></li>
                                                    @foreach($post->tags as $key => $tag)
                                                    <li>
                                                        <a href="#">{{$tag->title}}</a>
                                                        @if($key + 1 != count($post->tags))
                                                            ,
                                                    </li>
                                                    @endif
                                                @endforeach
                                                    @endif
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

                    <nav aria-label="Page navigation">

                        {{$posts->links('vendor.pagination.bootstrap-4')}}
                    </nav>
            </div>
        </div>
    </div>

@endsection
