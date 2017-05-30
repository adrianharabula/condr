@extends('layouts.app')

@section('page-colors', 'bg-black white')

@section('content')

@section('title', 'Edit Password')

@if (count($errors) > 0)
  <div class="row page black">
    <div class="col-md-4 col-md-offset-4">
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
  </div>
@endif

  <div class="row page black">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default text-center">
        <div class="panel-heading"> <h3> Edit your password! </h3> </div>
        <div class="panel-body">
          {{ Form::open(array('url' => route('my.account.change-password'))) }}
              {{ csrf_field() }}
              <div class="form-group">
                <input class="form-control" placeholder="Type the current password" name="oldpass" type="password" >
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Type the new password" name="newpass" type="password">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Retype the new password" name="newpass_confirmation" type="password" >
              </div>
              <div class="form-group">
                <input name="submitPassword" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown btn-block" type="submit" value="Change">
              </div>
          {{ Form::close() }}

        </div>
      </div><!-- /.col-->
    </div><!-- /.row -->
  </div>

@endsection
