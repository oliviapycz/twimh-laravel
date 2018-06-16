@extends('layouts.app')

@section('content')
  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ $user->name }}'s Profile</div>
                  
                  <div class="card-body">
                      <div class="col-md-10 col-md-offset-1">
                          <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                      </div>
                      <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
<div class="container">
    <div class="row">
        
    </div>
</div>

@endsection