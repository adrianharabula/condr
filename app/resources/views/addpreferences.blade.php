@extends('layouts.app')

@section('title','Add preferences')

@section('content')

  <div class="container contact">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h4><b>Enter your preferences here and let's get started!</b></h4>
        </div>
        <div class="panel-body">

          <div class="col-md-7 col-md-offset-1">
            <form role="form">


            <div class="col-md-9 col-md-offset-3">
              <div class="form-group">
                <h3>Tell us what to look after!</h3>
                <p>*Pay attention! If you want to enter your own preferences, you must provide them consisting in a noun and an attribute, separated by : as showed before!</p>
                <p>**Press + to add another preference field :)</p><br>

              <div class="col-md-offset-2">
                <a href={{ route('mypreferences')}}>
                  <button name="submitPreferences" type="submit" class="btn btn-primary my-btn">Add to my preferences!</button>
                </a>
              </div>

              <a href="sugestions.php">
              <button name="submitPreferences" type="submit" class="btn btn-primary my-btn">Get the results!</button>
              </a>

              <a href="preferences.php">
                <button type="reset" class="btn btn-primary my-btn">Reset form</button>
              </a>


              <button name="submitPreferences" type="submit" class="btn btn-primary my-btn">Add to my preferences!</button>
              {{Form::close()}}

            </div>
          </form>
        </div>
      </div>
    </div>

<style>
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

 .form-group {
   width: 60%;
 }
 button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: 1.9;
    margin-right: 10px;
  }

</style>

@push('scripts')
<script type="text/javascript" src="{{ asset('/js/plusbutton.js') }}"></script>
@endpush

@endsection
