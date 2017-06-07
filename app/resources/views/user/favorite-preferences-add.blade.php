@extends('layouts.app')

@section('title','Add preferences')

@section('content')

  <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h3><b>Enter your preferences here and let's get started!</b></h3>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
              <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                  <div class="subtitle">
                    <h3>Tell us what to look after!</h3>
                    <p>Pay attention! If you want us to give you the best results, you must provide your preferences consisting in a noun and an attribute, separated by ":" !  <i class="fa fa-smile-o"></i></p>
                    <p><b>Example</b>: color: red</p>
                  </div>
                  <br>

                  {{Form::open(array('url' => route('my.preferences.addbyyourself.submit'),  'method' => 'post'))}}
                    <input class="control-group btn-block" name="preference_name" type="text" value=""><br />
                    <button name="submitPreferences" type="submit" class="btn btn-primary my-btn btn-block">Add to my preferences!</button>
                  {{Form::close()}}

            </div>
        </div>
      </div>
    </div>
  </div>

<style>
 p {
   font-size: 14px;
 }
 h4 {
   font-size: 18px;
   margin-top: 20px;
 }
 .panel.panel-default {
   margin-top:30px;
 }
 .panel-body {
   margin-top: 30px;
 }
 .form-control {
   width: 70%;
 }
 .form-group {
   width: 100%;
 }
 button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    width: 67%;
    line-height: 1.9;
    margin-right: 10px;
  }

</style>

@push('scripts')
<script type="text/javascript" src="{{ asset('/js/plusbutton.js') }}"></script>
@endpush

@endsection
