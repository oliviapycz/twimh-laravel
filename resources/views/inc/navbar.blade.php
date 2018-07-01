<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav col-md-3">
                <li class="nav-item"><a class="nav-link" href="/posts">Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="/recipes">Recipes</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                
            </ul>
            {{--  <div class="col-md-5">
                {!! Form::open(array('rout' => 'queries.search', 'class'=>'form navbar-form  searchform')) !!}

                {!! Form::text('search', null,
                                    array('required',
                                            'class'=>'form-control',
                                            'placeholder'=>'Search by country or user...')) !!}
            </div>
            <div class="col-md-2">
                {!! Form::submit('Search',array('class'=>'btn btn-default')) !!}
            </div>
                {!! Form::close() !!}  --}}
            
                <div class="col-md-5 row">
                @include('searchbar.index')
            </div>
            
           
            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; border-radius:50%">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}"
                                >
                                {{ __('Dashboard') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('profile') }}"
                                ><i class="fa fa-btn fa-user"></i>
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fa fa-btn fa-sign-out"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>