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
                    <li class="breadcrumb-item active">資料</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@if(Session::has('deleted_document'))
    <h2 class="bg-danger">{{session('deleted_document')}}</h2>
@endif

@if(Session::has('edited_document'))
<h2 class="bg-success">{{session('edited_document')}}</h2>
@endif

@if(Session::has('created_document'))
<h2 class="bg-success">{{session('created_document')}}</h2>
@endif

{{-- <div class="col-sm-5 mb-3">
    <a href="{{route('categories.create')}}" class="btn btn-primary btn-lg">新規カテゴリー登録</a>
</div> --}}

<div class="col-sm-9">
    @if($documents)
    <h1> 資料 </h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ファイルパス</th>
                <th>利用状態</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($documents as $document)
            <tr>
                <td>{{$document->id}}</td>
                <td>{{$document->file_path}}</td>
                <td>{{$document->getFileUsage()}}</td>

                {{-- <td><a href="{{route('documents.edit', $document->id)}}"><button type="button"
                            class="btn btn-primary">編集</button></a></td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['DocumentController@destroy', $document->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('削除', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                <td> --}}
            </tr>
            @endforeach
            @endif

</div>

</tbody>
</table>

@stop
