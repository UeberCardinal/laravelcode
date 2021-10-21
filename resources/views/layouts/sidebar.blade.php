<div class="sidebar">
    <div class="row">
        <div class="col-lg-12">
            <div class="sidebar-item search">
                <form style="display: inline-flex" id="search_form" name="search" method="GET" action="{{route('search')}}">
                    <input type="text" name="s" required class="searchText" placeholder="type to search..." autocomplete="on">
                    <button class="btn btn-light"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                    <h2>Popular Posts</h2>
                </div>
                <div class="content">
                    <ul>
                        @foreach($popular_posts as $popular_post)
                        <li><a href="{{route('posts.single', ['slug' => $popular_post->slug])}}">
                                <h5>{{$popular_post->title}}</h5>
                                <span>{{$popular_post->getPostDate()}} | <i class="fa fa-eye"></i> {{$popular_post->views}}</span>

                            </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item categories">
                <div class="sidebar-heading">
                    <h2>Popular Categories</h2>
                </div>
                <div class="content">
                    <ul>
                        @foreach($popular_category as $category)
                        <li><a href="{{route('categories.single', ['slug' => $category->slug])}}">{{$category->title}} ({{$category->posts_count}})</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item tags">
                <div class="sidebar-heading">
                    <h2>Tag Clouds</h2>
                </div>
                <div class="content">
                    <ul>
                        @foreach($tags as $tag)
                        <li><a href="{{route('tags.single', ['slug' => $tag->slug])}}">{{$tag->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
