@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h3 class="col-md-12 title-section">Edit Recipe</h3>
        <div class="col-md-8">
            {!! Form::open(['action' => ['RecipesController@update', $recipe->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])  !!}
            {{--multipart/form-data enables the BROWSE UPLOAD Button--}}
            <div class="form-group">
                {{Form::label('country', 'Country')}}
                {{Form::text('country', $recipe->country, ['class'=>'form-control', 'placeholder' => 'Country'])}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $recipe->title, ['class'=>'form-control', 'placeholder' => 'Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', $recipe->description, ['id' => 'article-ckeditor', 'class'=>'form-control', 'placeholder' => 'Short Description'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $recipe->body, ['id' => 'article-ckeditor', 'class'=>'form-control', 'placeholder' => 'Your Post'])}}
            </div>

            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>

            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
