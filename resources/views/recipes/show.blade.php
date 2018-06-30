@extends('layouts.app')

@section('content')

  <a href="/recipes" ><button class="btn btn-default">Go Back To All Recipes</button> </a>
  <div class="col-md-8 offset-md-2">
      <div class="card">
          <div class="card-header">
                  <p>{{$recipe->country}}</p>
          </div>
          <div class="card-body row">
              <p class="col-md-12">{{$recipe->title}}</p>
              <img class="col-md-6" src="/storage/cover_images/{{$recipe->cover_image}}" alt="">
              <div class="col-md-6 row d-flex align-self-start">
                  <h6 class=""> Ingrédients</h6>
                @foreach ($recipe->ingredients as $ingredient)
                    <p class="col-md-12 ">-> {{$ingredient->ingredient}}</p>
                @endforeach
              </div>
              
              <section class="col-md-12">
                  <p>{!!$recipe->body!!}</p>
              </section>
          </div>
          <div class="card-footer">
                  <p>by {{$recipe->user->name}}</p> 
                  <p>added on {{$recipe->created_at->format('d/m/Y')}}</p>
                
          </div>
      </div>
  </div>
@endsection
