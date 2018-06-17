@extends('layouts.app')

@section('content')

  <a href="/posts" ><button class="btn btn-default">Go Back To All Posts</button> </a>
  <div class="col-md-8 offset-md-2">
      <div class="card">
          <div class="card-header">
                  <p>{{$post->country}}</p>
          </div>
          <div class="card-body row">
              <p class="col-md-12">{{$post->title}}</p>
              <img class="col-md-12" src="/storage/cover_images/{{$post->cover_image}}" alt="">
              <section class="col-md-12">
                  <p>{!!$post->body!!}</p>
              </section>
          </div>
          <div class="card-footer">
                  <p>by {{$post->user->name}}</p> 
                  <p>added on {{$post->created_at}}</p>
                
          </div>
      </div>
  </div>
@endsection
