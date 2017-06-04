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

                  <label>Select your preferences from our predefined list...</label><br>
                  {{Form::open(array('url' => route('my.preferences.listpreferences')))}}
                  <br>

                  <select class="form-control">
                    <option>Battery: good</option>
                    <option>Charging time: 1h</option>
                    <option>Charging time: <1h</option>
                    <option>Color: black</option>
                    <option>Color: white</option>
                    <option>Color: blue</option>
                    <option>Dimension: 13"</option>
                    <option>Dimension: 15"</option>
                    <option>Dimension: 17"</option>
                    <option>Size: small</option>
                    <option>Size: medium</option>
                    <option>Size: large</option>
                    <option>Taste: sweet</option>
                    <option>Taste: sour</option>
                    <option>Taste: chilli</option>
                  </select><br>

                  <label>...or enter your own preferences!*</label>
                  <input type="hidden" name="count" value="1" />
                  <div class="control-group" id="fields">
                      <div class="controls" id="profs">
                          <form class="input-append">
                              <div id="field">
                                <input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="" data-items="8"/>
                                <button id="b1" class="btn add-more" type="button">+</button>
                              </div>
                          </form><br>
                      </div>
                  </div>
                </div>

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
   width: 100%;
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
