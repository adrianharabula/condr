@extends('layouts.app')

@section('title','My preferences')

@section('content')

<div class="col-md-8 col-md-offset-2 text-center" style="margin-top: 30px;margin-bottom:30px;">
  <div class="panel-heading">
    <h2><b>Change/Update your preferences</b></h2>
  </div>

</div>
@if(Session::has('message'))
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissable" style="text-align: center;">
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
<div class="row">
  <div class="col-md-10 col-md-offset-2">
    <div class="panel">

  	    <div class="panel-body">
          <div class="container">
            <div class="row">
              <div class="col-md-10">

                {{ Form::open(array('url' => route('my.preferences.searchby'))) }}
                {{ csrf_field() }}               
                @forelse ($preferences as $preference)

                      <div class="col-md-7 col-md-offset-2">

                        {{ Form::checkbox('preferences_name[]',$preference->name.':'.$preference->pivot->cvalue,false) }} {{$preference->name}}: {{$preference->pivot->cvalue}}

                        <a href="{{ route('my.preferences.delete', array($preference->id, $preference->pivot->cvalue)) }}" class="close" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </a>
                      </div>

                @empty
                <div class="col-md-7 col-md-offset-2">
                  <h4>Unfortunatelly, you have no preferences stored in your history!....</h4>
                </div><br>
              @endforelse
                <div class="col-md-7 col-md-offset-2">
                  <h4>You can click <a href="{{ route('my.preferences.addbyyourself')}}" style="font-size: 20px;">here</a> to add more!  <i class="fa fa-smile-o"></i></h4>
                  {{ Form::submit('Search by selected preferences', array('class' => 'btn btn-block btn-primary my-btn btn-start my-btn-dropdown')) }}
                </div>
                {{ Form::close() }}
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
<style>
input[type=checkbox]{
    margin: 10px 10px 10px;
}
span {
  font-size: xx-large;
}
@media (min-width: 992px)
.col-md-offset-2 {
    font-size: 17px;
}
b {
  color:#2F937B;
}
h4 {
  font-size: 19px;
}
</style>

@endsection
