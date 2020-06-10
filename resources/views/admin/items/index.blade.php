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
                    <li class="breadcrumb-item active">項目</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@if(Session::has('deleted_item'))
    <h2 class="bg-danger">{{session('deleted_item')}}</h2>
@endif

@if(Session::has('edited_item'))
<h2 class="bg-success">{{session('edited_item')}}</h2>
@endif

@if(Session::has('created_item'))
<h2 class="bg-success">{{session('created_item')}}</h2>
@endif

<div class="col-sm-5 mb-3">
    <a href="{{route('items.create')}}" class="btn btn-primary btn-lg">新規項目登録</a>
</div>

<div class="col-sm-9">
    @if($items)
    <h1> 項目 </h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>項目名</th>
                <th>(サブ)カテゴリー名</th>
                <th>URL</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                @if ($item->category)
                    <td>{{$item->category->name}}</td>
                @endif

                @if ($item->subcategory)
                    <td>{{$item->subcategory->name}}</td>
                @endif

                @if ($item->document)
                    <td>{{$item->document->file_path}}</td>
                    @else
                    <td> No file </td>
                @endif



                <td><a href="{{route('items.edit', $item->id)}}"><button type="button"
                            class="btn btn-primary">編集</button></a></td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['ItemController@destroy', $item->id]]) !!}
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
