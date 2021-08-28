@extends('admin.layouts.layout')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование поста</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="card card-primary m-2">
        <div class="card-header">
            <h3 class="card-title">Редактирование поста</h3>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{route('posts.update', ['post' => $post->id])}}">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название поста</label>
                    <input value="{{$post->title}}" id="title" name="title" type="text" class="form-control @error('title')
                        is-invalid @enderror"  placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Цитата поста</label>
                    <textarea  id="description" name="description" type="text" class="form-control @error('description')
                        is-invalid @enderror"  placeholder="Цитата">{{$post->description}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Контент</label>
                    <textarea id="content" name="content" class="form-control @error('content')
                        is-invalid @enderror " rows="5" placeholder="Контент ...">{{$post->content}}</textarea>
                </div>
                {{--{{dd($categories)}}--}}
                <div class="form-group">
                    <label>Выберите категорию</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $k => $v)
                            <option value="{{ $k }}" @if($k == $post->category_id) selected="{{$v}}" @endif>{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Multiple</label>
                      {{--  {{dd($post->tags->pluck('title', 'id'))}}--}}
                    <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">

                        @foreach($tags as $k => $v)
                            <option value="{{$k}}"@if(in_array($k, $post->tags->pluck('id')->all())) selected="{{$v}}"
                                @endif>{{ $v }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Изображение</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="thumbnail" type="file" class="custom-file-input" id="exampleInputFile" >
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                   {{-- {{dd($post->getImage())}}--}}
                    <div class="mt-2"><img class="img-thumbnail" src="{{$post->getImage()}}" width="150px" alt=""></div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
        <!-- /.content -->
    </div>



@endsection
