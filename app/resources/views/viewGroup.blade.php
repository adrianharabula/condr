@extends('layouts.app')

@section('content')

  <div class="container">
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
