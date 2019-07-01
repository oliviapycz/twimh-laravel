@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h3 class="col-md-12 title-section">Create Recipe</h3>
        <div class="col-md-8">
            {!! Form::open(['action' => 'RecipesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])  !!}
            {{--multipart/form-data enables the BROWSE UPLOAD Button--}}
            <div class="form-group">
                {{Form::label('country', 'Country')}}
                {{Form::text('country', '', ['class'=>'form-control', 'placeholder' => 'Country'])}}
            </div>
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class'=>'form-control', 'placeholder' => 'Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', '', ['class'=>'form-control', 'placeholder' => 'Short Description'])}}
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input_fields_container">
                        <a class=' add_more_button btn btn-primary' style='color:white'>
                            Add Ingredient
                        </a>
                    <div class="form-group">
                        {{Form::label('ingredient', 'Ingredient')}}
                        {{Form::text(
                            'ingredients[][ingredient]',
                            null,
                            [
                                'class'=>'form-control searchApifood',
                                'placeholder' => 'ingredient',
                                'id'=>'searchApifood_0'
                            ]
                        )}}
                    </div>
                </div>
                </div>
                <div class="col-6">

                </div>
            </div>
        
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class'=>'form-control', 'placeholder' => 'Your Recipe'])}}
            </div>

            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>

            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
 