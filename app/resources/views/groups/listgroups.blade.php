@extends('layouts.app')

@section('title','Groups')

@section('content')

  <div class="container page" style="background-color:grey;">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3>A few groups you can join...</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            {{ Form::open() }}
            {{ csrf_field() }}
            <div class="form-group col-md-12">
              <input type="text" class="form-control" name="group_name" placeholder="Enter the group's name">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Search</button>
            </div>
          {{Form::close()}}
        </div>
      </div>

      <div class="row bg-black">
        <div class="col-md-12 bg-black white">
          @foreach($groups as $group)
            <div class="row">
              <div class="col-sm-12 col-md-8" style="padding:20px;">
                <a href="#" class="name">Group name: <b>{{ $group->name }}</b></a>
                <p>{{ $group->description}} <span class="badge">{{ $group->ID}}</span></p>
              </div>

              <div class="col-xs-6 col-md-2">
                <a href={{ route('groups.singleview', $group->id) }} class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown" style="margin-top:20px;">View</a>
              </div>
              <div class="col-xs-6 col-md-2">
                  <a href="{{ route('my.group.add', $group->id) }}" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown" style="margin-top:20px;" > JOIN </a>
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