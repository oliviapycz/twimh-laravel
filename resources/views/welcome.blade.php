@extends('layouts.app')

@section('content')
    <div class="container-fluid landingpage">
        <section>
            <h1>
                <strong>"</strong>
                Travel the World without Barrier
            </h1><br>
             <h1>
                And Make Every City your Own
                <strong>"</strong>
            </h1>
            <a href="#lasttrips"><img src="{{URL::asset('/images/mouse.png')}}" alt="mouse"></a>
        </section>
    </div>
    @include('homepage.lasttrips')
@endsection
