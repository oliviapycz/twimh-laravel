<div class="container-fluid lastrtips">
    <section id="lasttrips" class="title-section">
        <h2>Derniers Voyages</h2>
    </section>
    <div class="row justify-content-center">
        @if(count($posts) > 0)
        @foreach($posts as $post)
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header">
                          <p>{{$post->country}}</p>
                  </div>
                  <div class="card-body row">
                      <p class="col-md-12">{{$post->title}}</p>
                      <img class="col-md-12" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                      <section class="col-md-12">
                              <p>{{$post->description}}</p>
                              <a href="/posts/{{$post->id}}"><button class=" col-md-4 offset-md-4 btn btn-secondary btn-sm">SEE</button></a>
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
    <div class="row">
        @if(count($posts) > 5)
          
            <a href="/posts" class="col-md-10 offset-md-1 bar-btn-seeall">
              <button class="col-md-4 offset-md-4 col-6 offset-3 btn btn-secondary">
                      SEE ALL POSTS
              </button>
            </a>

        @endif
    </div>
</div>