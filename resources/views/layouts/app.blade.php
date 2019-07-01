<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('APP_NAME', 'T.W.I.M.H.') }}</title>

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

    <script
    src="https://code.jquery.com/jquery-2.2.4.js"
    type="text/javascript"
    integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
    type="text/javascript"
    integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
    crossorigin="anonymous"></script>

    
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    
    <script>

        $("#search_text").autocomplete({
            source:'{!!URL::route('autocomplete')!!}',
            //source: "search/autocomplete",
            minLength: 2,
            select: function(event, ui) {
                  $('#search_text').val(ui.item.value);
            }
        });
        
        $('#searchApifood_0').autocomplete({
            source:'{!!URL::route('apifoodautocomplete')!!}',
            minLength: 2,
            select: function(event, ui) {
                $('#searchApifood_0').val(ui.item.value);
            }
        }); 

        


        var index = 0;
      var max_fields_limit = 15;
      $('.add_more_button').click(function(e){
          e.preventDefault();
          // Get last id 
          console.log(document.getElementById('searchApifood_0').value);
          
          console.log('[addmorebutton] searchApifood_id', searchApifood_id);
            var searchApifood_id = $('.input_fields_container input[type=text]:nth-last-child(1)').attr('id');
            console.log('[addmorebutton] searchApifood_id', searchApifood_id);

            var split_id = searchApifood_id.split('_');
            console.log('[addmorebutton] split_id', split_id);

            // New index
            //var index = Number(split_id[1]) + 1;
            index ++;
            console.log('[addmorebutton] index', index);
            

          if(index < max_fields_limit){ //check conditions
                $('.input_fields_container').append(
                  '<div class="form-group">{{Form::label('ingredient', 'Ingredient')}}{{Form::text('ingredients[][ingredient]', '', ['class'=>'form-control searchApifood', 'placeholder' => 'ingredient'])}}</div>'
                ); //add input field
               
          }
          var $child = $('.input_fields_container input[type=text]').last();
          console.log('$child', $child);

            $child.attr('id', 'searchApifood_'+index);
            console.log('#searchApifood_'+index)
                $('#searchApifood_'+index).autocomplete({
                    //source: "http://localhost:3000/foods/search/result_ing=",
                    //source: "search/apifood/autocomplete",
                    source:'{!!URL::route('apifoodautocomplete')!!}',
                    minLength: 2,
                    select: function(event, ui) {
                          $('#searchApifood_'+index).val(ui.item.value);
                    }
                });
            console.log('search', $('#searchApifood_'+index));
      });  


//      $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
//          e.preventDefault(); $(this).parent('div').remove();
//      })
    </script>
</html>

