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
    <div class="container-fluid lasttrips">
        <section id="lasttrips" class="title-section">
            <h2>Derniers Voyages</h2>
        </section>
    </div>
@endsection
