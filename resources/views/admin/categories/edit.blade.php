@extends('admin.layouts.layout')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание категории</h1>
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
            <h3 class="card-title">Редактирование категории</h3>
        </div>
        <form method="post" action="{{route('categories.update', ['category' => $category->id])}}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название категории</label>
                    <input value="{{$category->title}}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1">
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
