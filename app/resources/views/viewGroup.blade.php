@extends('layouts.app')

@section('title','View group')

@section('content')

  <div class="container">

    @if(Session::has('status'))

      <div class="row">
      	<div class="col-md-4 col-md-offset-4" style="margin-top: 40px;">
        	<div class="panel panel-success">
            <div class="panel-heading">Joined group successfully!</div>
          </div>
        </div>
      </div>
    @endif

    <div class="row page black">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h1>{{ $group->name }}</h1>
        </div>

        <div class="panel-body">
          <div class="col-md-3">
            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="/Assets/img/Product-Icon.png" style=""> </a>
          </div>
          <div class="col-md-9">
            <h4>Group name: {{ $group->name }}</h4>
            <h4>Group description: {{ $group->description }}</h4>
            <h4>Members of the group</h4>
            @foreach ($group->users as $user)
                <h5> {{ $user->name }} </h5>
            @endforeach

          </div>

        </div>
      </div>
    </div>
  </div>
  <style>
  .panel-heading {
    text-align: center;
  }
  </style>

@endsection
