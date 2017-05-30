@extends('layouts.app')

@section('page-colors', 'bg-black white')

@section('content')

@section('title', 'Details')

<div class="container">

    @if(Session::has('message'))
        <div class="row page black">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if(Session::get('alert-class') === 'alert-danger')
                        <strong>Error: </strong>
                    @else
                        <strong>Success: </strong>
                    @endif
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    @endif

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
                <div><a href= {{route('my.account.change-password')}} class="btn btn-primary my-btn btn-start my-btn-dropdown btn-block">Edit Password</a></div>
              </fieldset>
          </div>
        </div>
      </div><!-- /.col-->
  </div><!-- /.row -->
</div>



@endsection
