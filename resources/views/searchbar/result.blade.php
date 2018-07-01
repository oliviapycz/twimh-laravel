@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <section class="">
        <h3 class="text-center">Result for {{strtoupper($_GET['search_text'])}} . . .</h3>
    </section>

    
    <div class="row justify-content-center">
      <div class="col-md-6">
        <section class="title-section">
          <h4 class="">Posts</h4>
        </section>
      
          @if(count($posts) > 0)
          @foreach($posts as $post)
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                            <p>{{$post->country}}</p>
                    </div>
                    <div class="card-body row">
                        <p class="col-md-12">{{$post->title}}</p>
                        <img class="col-md-12" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                        <section class="col-md-12">
                                <p>{{$post->description}}</p>
                                <a href="/posts/{{$post->id}}"><button class=" col-md-4 offset-md-4 btn btn-primary btn-sm">SEE ALL</button></a>
                        </section>
                    </div>
                    <div class="card-footer">
                        <p>by {{$post->user->name}}</p> 
                        <p>added on {{$post->created_at->format('d/m/Y')}}</p>
                          
                    </div>
                </div>
          </div>
          @endforeach
        @else
          <p>No Posts yet</p>
        @endif
      </div>

      <div class="col-md-6">

          <section class="title-section">
              <h4 class="">Recipes</h4>
            </section>
            
          <div class="row justify-content-center">
              @if(count($recipes) > 0)
              @foreach($recipes as $recipe)
                <div class="col-md-8 offset-md-">
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
            @else
              <p>No Recipes yet</p>
            @endif
        </div>
      </div>
        

    

</div>
@endsection
