@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <section class="title-section">
            <h2 class="">Recipes</h2>
    </section>
    
    <div class="row justify-content-center">
        @if(count($recipes) > 0)
        @foreach($recipes as $recipe)
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header">
                          <p>{{$recipe->country}}</p>
                  </div>
                  <div class="card-body row">
                      <p class="col-md-12">{{$recipe->title}}</p>
                      <img class="col-md-12" src="/storage/cover_images/{{$recipe->cover_image}}" alt="">
                      <section class="col-md-12">
                              <p>{{$recipe->description}}</p>
                              <a href="/recipes/{{$recipe->id}}"><button class=" col-md-4 offset-md-4 btn btn-primary btn-sm">SEE ALL</button></a>
                      </section>
                  </div>
                  <div class="card-footer">
                      <p>by {{$recipe->user->name}}</p> 
                      <p>added on {{$recipe->created_at->format('d/m/Y')}}</p>
                        
                  </div>
              </div>
        </div>
        @endforeach
        {{$recipes->links()}}
      @else
        <p>No Recipes yet</p>
      @endif
    <div>
</div>
@endsection