<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        Your Recipes
                    <a href="/posts/create"><button class="btn btn-success btn-sm">
                        Add a new Recipe
                    </button></a>
                </div>
                @if(count($recipes) > 0)
                <div class="card-body ">
                    <section class="row" style="border-bottom: 1px solid lightgrey; margin-bottom:15px">
                        <div class="col-md-3">COUNTRY</div>
                        <div class="col-md-5">RECIPE TITLE</div>
                        <div class="col-md-2">EDIT RECIPE</div>
                        <div class="col-md-2">DELETE RECIPE</div>
                    </section>
                    @foreach($recipes as $recipe)
                    <section class="row " style="margin-bottom:15px">
                        <div class="col-md-3">{{$recipe->country}}</div>
                        <div class="col-md-5">{{$recipe->title}}</div>
                        <div class="col-md-2"><a href="/recipes/{{$recipe->id}}/edit"><button class="btn btn-primary btn-sm">Edit Post</button></a></div>
                        <div class="col-md-2">
                            
                            {!!Form::open(['action' => ['RecipesController@destroy', $recipe->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                            {!!Form::close()!!}
                        </div>
                    </section>
                    @endforeach
                </div>
                @else
                <p>No Recipes Yet</p>
                @endif
            </div>
        </div>
    </div>
</div>