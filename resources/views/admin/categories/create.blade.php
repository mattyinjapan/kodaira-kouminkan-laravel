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
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">オーム</a></li>
                    <li class="breadcrumb-item active">カテゴリー</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="col-sm-3">
    <h1>カテゴリー登録</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'CategoryController@store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'カテゴリー名:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('order', '表示順番:') !!}
        {!! Form::text('order', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('url', 'URL:') !!}
        {!! Form::text('url', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('カテゴリー登録', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


</div>


@stop
