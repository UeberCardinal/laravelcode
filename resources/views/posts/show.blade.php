@extends('layouts.layout')
@section('title', 'Stand Blog :: ' . $post->title )
@section('banner')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Post Details</h4>
                            <h2>Single blog post</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('content')
    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="col-lg-8">
        <div class="all-blog-posts">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{$post->getImage()}}" alt="">
                        </div>
                        <div class="down-content">
                            <a href="{{route('categories.single', ['slug' => $post->category->slug])}}"><span>{{$post->category->title}}</span></a>
                           <h4>{{$post->title}}</h4>
                            <ul class="post-info">
                                <li><a href="#">Admin</a></li>
                                <li><a href="#">{{$post->getPostDate()}}</a></li>
                                <li><a href="#comments"><i class="fa fa-comment"></i> {{$post->comments()->count()}} </a></li>
                                <li> <a href="#"><i class="fa fa-eye"> {{$post->views}}</i></a></li>
                            </ul>
                           <div>{!! $post->content !!} </div>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-6">
                                        @if($post->tags->count())
                                        <ul class="post-tags">
                                            <li><i class="fa fa-tags"></i></li>

                                            @foreach($post->tags as $key => $tag)

                                            <li><a href="{{route('tags.single', ['slug' => $tag->slug])}}">{{$tag->title}}</a>
                                                @if($key + 1 != count($post->tags)),</li>
                                                @endif
                                            @endforeach

                                        </ul>
                                        @endif
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
                <div class="col-lg-12">
                    <a name="comments"></a>
                    <div class="sidebar-item comments">

                        <div class="sidebar-heading">
                            <h2>{{$comments->count()}} comments</h2>
                        </div>
                        <div class="content">
                            <ul>
                                @foreach($comments as $comment)
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('no-image.jpeg')}}" alt="">
                                    </div>
                                    <div class="right-content">
                                        <h4>{{$comment->name}}<span>{{$comment->getCommentDate()}}</span></h4>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="sidebar-item submit-comment">
                        <div class="sidebar-heading">
                            <h2>Your comment</h2>
                        </div>
                        <div class="content">

                            <form id="comment" action="{{route('comment', ['slug' => $post->slug])}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <input name="name" type="text" id="name" placeholder="Your name" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <input name="email" type="text" id="email" placeholder="Your email" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="subject" type="text" id="subject" placeholder="Subject">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="comment" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Submit</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

