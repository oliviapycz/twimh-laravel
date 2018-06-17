<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        Your Posts
                    <a href="/posts/create"><button class="btn btn-success btn-sm">
                        Add a new Post
                    </button></a>
                </div>
                @if(count($posts) > 0)
                <div class="card-body ">
                    <section class="row" style="border-bottom: 1px solid lightgrey; margin-bottom:15px">
                        <div class="col-md-1">ID</div>
                        <div class="col-md-2">COUNTRY</div>
                        <div class="col-md-5">POST TITLE</div>
                        <div class="col-md-2">EDIT POST</div>
                        <div class="col-md-2">DELETE POST</div>
                    </section>
                    @foreach($posts as $post)
                    <section class="row " style="margin-bottom:15px">
                        <div class="col-md-1">{{$post->id}}</div>
                        <div class="col-md-2">{{$post->country}}</div>
                        <div class="col-md-5">{{$post->title}}</div>
                        <div class="col-md-2"><a href="/posts/{{$post->id}}/edit"><button class="btn btn-primary btn-sm">Edit Post</button></a></div>
                        <div class="col-md-2">
                            
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                            {!!Form::close()!!}
                        </div>
                    </section>
                    @endforeach
                </div>
                @else
                <p>No Posts Yet</p>
                @endif
            </div>
        </div>
    </div>
</div>