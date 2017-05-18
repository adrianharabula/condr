@extends('layouts.app')

@section('content')

  <div class="row">
  	<div class="col-md-4 col-md-offset-4" style="margin-top: 40px;">
  	<div class="panel panel-success">
        <div class="panel-heading">Joined group successfully!</div>
    </div>
    <div class="col-md-9"><a href={{ route('viewGroup', $group->id) }} class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">View details</a></div>
  </div>
  </div>


  <style>
  .col-md-9 {
      width: 97%;
  }
  .panel-success {
      margin-left:20px;
      margin-right:20px;
  }
  .panel-heading {
    text-align: center;
  }
  </style>


@endsection
