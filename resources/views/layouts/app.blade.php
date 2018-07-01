<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/autocomplete.css') }}" rel="Stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body id="smoothscroll">
        
        <div id="app">
            <header>
                @include('inc.navbar')
            </header>
            <main class="">
                @include('inc.messages')
                @yield('content')
            </main>
            <footer>
                @include('inc.footer')
            </footer>
        </div>
    </body>
    {{--  <script src="{{ asset('js/ckeditor.js') }}"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
    integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
    crossorigin="anonymous"></script>
    {{--  <script src="{{ asset('js/script.js') }}" defer></script>  --}}
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script>
        $("#search_text").autocomplete({
            source: "search/autocomplete",
            minLength: 2,
            select: function(event, ui) {
                  $('#search_text').val(ui.item.value);
            }
      });
      
      $(".add_an_ingredient").hide();
      $(".add_ingredient").click(function() {
            $(".add_an_ingredient").show();
            $(".add_ingredient").hide();
      });
    </script>
</html>
