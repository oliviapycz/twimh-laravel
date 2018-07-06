     
<div class="col-md-9">
{{ Form::open(['action' => ['SearchbarController@result'], 'method' => 'GET']) }}           
{!! Form::text(
  'search_text',
  null,
  [
    'placeholder' => 'Search by country...',
    'class' => 'form-control',
    'id'=>'search_text'
  ]
  ) 
!!}
</div>
<div class="col-md-3">
{{ Form::submit('Search', array('class' => 'btn btn-default')) }}
</div>
{{ Form::close() }}
