@extends('layouts.app')

@section('content')

  <div class="container page">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3>A few groups you can join...</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
          <form class="form">
            <div class="form-group col-md-12">
              <input type="text" class="form-control" id="name" placeholder="Enter the group's name">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Search</button>
            </div>
          </form>
        </div>
      </div>

      <div class="row bg-black">
        <div class="col-md-12 bg-black white">
          @foreach($groups as $group)
            <div class="row">
              <div class="col-sm-12 col-md-8">
                <a href="#" class="name">Group name: <b>{{ $group->name }}</b></a>
                <p>{{ $group->description}} <span class="badge">{{ $group->ID}}</span></p>
              </div>

              <div class="col-xs-6 col-md-2">
                <a href={{ route('viewGroup', $group->id) }} class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">View</a>
              </div>
              <div class="col-xs-6 col-md-2">
                <a href={{ route('joinGroup', $group->id) }} class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Join</a>
              </div>
          </div> <br />
        @endforeach
        </div>
      </div>
  </div>

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/groups.css') }}">
@endpush

@endsection
