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
                    <li class="breadcrumb-item active">サブカテゴリー</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // show and hide category
            $('.subcategory').hide();
            $("input[type='radio'][name='category_type'").change(
                function(){
                    if (this.value == "cat"){
                        $('.category').show();
                        $('.subcategory').hide();
                    }
                    else {
                        $('.category').hide();
                        $('.subcategory').show();
                    }
                }
            )
            // show and hide file upload
            $('.rep').hide();
            $("input[type='radio'][name='upload_type'").change(
                function(){
                    if (this.value == "rep"){
                        $('.rep').show();
                        $('.upload').hide();
                    }
                    else {
                        $('.rep').hide();
                        $('.upload').show();
                    }
                }
            )
        });

</script>

<div class="col-sm-3">
    <h1>サブカテゴリー登録</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'SubcategoryController@store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'サブカテゴリー名:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group" required>
        {!! Form::label('category_type', 'カテゴリー') !!}
        {!! Form::radio('category_type', 'cat' , true) !!}

        {!! Form::label('category_type', 'サブカテゴリー') !!}
        {!! Form::radio('category_type', 'sub' , false) !!}
    </div>

    <div class="form-group category">
        {!! Form::label('category_id', 'カテゴリー名:') !!}
        {!! Form::select('category_id', $categories, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group subcategory">
        {!! Form::label('subcategory_id', 'サブカテゴリー名:') !!}
        {!! Form::select('subcategory_id', $subcategories, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('url', 'URL:') !!}
        {!! Form::text('url', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('order', '表示順番:') !!}
        {!! Form::text('order', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('サブカテゴリー登録', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


</div>


@stop
