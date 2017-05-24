@extends('layouts.app')

@section('title','View group')

@section('content')

  <div class="container">

    @if(Session::has('status'))

      <div class="row">
      	<div class="col-md-4 col-md-offset-4" style="margin-top: 40px;">
        	<div class="panel panel-success">
            <div class="panel-heading">{{ Session::get('status') }}</div>
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
            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://lorempixel.com/300/400/abstract/" style="width:100%;"> </a>
          </div>
          <div class="col-md-9">
            <h3 style="text-align:center;"> *{{ $group->description }}* </h3><br><br>

            <h4>Members of the group: </h4>
            <h5>
            @foreach ($group->users as $user)
              {{ $loop->first ? '' : ', '}}
              {{ $user->name }}
            @endforeach
          </h5>

            <h4>Characteristics of the group: </h4>
            <h5>
            @forelse ($group->characteristics as $characteristic)
              {{ $loop->first ? '' : ', '}}
              {{ $characteristic->name }}: {{$characteristic->values()}}
            @empty
               None
            @endforelse
          </h5>

          </div>

        </div>
      </div>
    </div>
  </div>
  <style>
  .panel-heading {
    text-align: center;
  }
  h4 {
  margin-bottom: 7px;
  font-size: 18px;
  font-weight: 600;
  color: #2F937B;
  }
  h5 {
    margin-bottom: 25px;
  }
  .panel-info>.panel-heading {
    color: white;
    background-color: #85144B;
    border-color: #bce8f1;
  }
  </style>

@endsection
