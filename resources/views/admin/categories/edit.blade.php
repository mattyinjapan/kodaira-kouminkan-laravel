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
                    <li class="breadcrumb-item active">カテゴリー編集</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="col-sm-3">
    {!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoryController@update', $category->id],]) !!}

    <div class="form-group">
        {!! Form::label('Name', 'カテゴリー名:') !!}
        {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Name', '表示順番:') !!}
        {!! Form::text('order', $category->order, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('url', 'URL:') !!}
        {!! Form::text('url', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('保存する', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>





@stop
