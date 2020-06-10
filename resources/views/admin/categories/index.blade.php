@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">ホーム</a></li>
                    <li class="breadcrumb-item active">カテゴリー</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@if(Session::has('deleted_category'))
    <h2 class="bg-danger">{{session('deleted_category')}}</h2>
@endif

@if(Session::has('edited_category'))
<h2 class="bg-success">{{session('edited_category')}}</h2>
@endif

@if(Session::has('created_category'))
<h2 class="bg-success">{{session('created_category')}}</h2>
@endif

<div class="col-sm-5 mb-3">
    <a href="{{route('categories.create')}}" class="btn btn-primary btn-lg">新規カテゴリー登録</a>
</div>

<div class="col-sm-9">
    @if($categories)
    <h1> カテゴリー </h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>カテゴリー名</th>
                <th>表示順番</th>
                <th>URL</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->order}}</td>
                <td>{{$category->url}}</td>
                <td><a href="{{route('categories.edit', $category->id)}}"><button type="button"
                            class="btn btn-primary">編集</button></a></td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['CategoryController@destroy', $category->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('削除', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                <td>
            </tr>
            @endforeach
            @endif

</div>

</tbody>
</table>

@stop
