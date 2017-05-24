@extends('layouts.app')

@section('page-colors', 'bg-black white')

@section('content')

@section('title', 'Details')

@if(session('success_message'))
  <div class="row">
  	<div class="col-md-4 col-md-offset-4" style="margin-top: 40px;">
    	<div class="panel panel-success">
          <div class="panel-heading">{{ session('success_message')}} </div>
      </div>
    </div>
  </div>
@endif

<div class="container">
  <div class="row page black">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading text-center">
            <b>Your details...</b>
          </div>
          <div class="panel-body">
              <fieldset>
                    <div class="form-group">
                        <div class="form-group">
                           <p><span style="color:green"><b>Username: </b></span> {{$user->name}} </p>
                        </div>
                        <div class="form-group">
                           <p><span style="color:green"><b>Email: </b></span> {{$user->email}} </p>
                        </div>
                    </div>
                <div><a href= {{route('editpassword')}} class="btn btn-primary my-btn btn-start my-btn-dropdown btn-block">Edit Password</a></div>
              </fieldset>
          </div>
        </div>
      </div><!-- /.col-->
  </div><!-- /.row -->
</div>



@endsection
