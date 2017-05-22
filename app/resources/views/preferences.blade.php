@extends('layouts.app')

@section('title','Preferences page')

@section('content')

<div class="container contact">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Enter your preferences here and let's get started!</h4>
    </div>
    <div class="panel-body">
      <div class="col-md-7 col-md-offset-1">
        <form role="form">

          <div class="form-group">
            <label>Product name*</label>
            <input class="form-control" placeholder="Enter the name of the searched product">
          </div>

          <div class="form-group">
            <label>Category*</label>
            <select class="form-control">
              <option>Electronics</option>
              <option>Clothes</option>
              <option>Footwear</option>
              <option>Food</option>
              <option>Games</option>
              <option>Services</option>
              <option>Education</option>
              <option>Other</<option>
            </select>
          </div>

          <div class="form-group">
            <label>Company</label>
            <input name="companyName" type="password" class="form-control">
          </div>

          <div class="form-group checkbox">
            <label>
              <input name="addProductToHistory" type="checkbox">Add product to my history
            </label>
          </div><br><br>

        </div>
        <div class="col-md-7 col-md-offset-1">
          <div class="form-group">
            <h3>Tell us what to look after!</h3>
            <p>*Pay attention! If you want to enter your own preferences, you must provide them consisting in a noun and an attribute, separated by : and one space, as showed below!</p>
            <p>**Press + to add another preference field :)</p><br>
            <div class="checkbox">
              <label>
                <input name="wanted" type="checkbox" value="">I want the following characteristics
              </label>
            </div>
          </div>

          <div class="form-group">
            <label>Select your wanted preferences from our predefined list...</label><br>
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
            </select>
          </div>

          <div class="form-group">
            <label>...or enter your own wanted preferences!*</label>
            <input type="hidden" name="count" value="1" />
                <div class="control-group" id="fields">
                    <div class="controls" id="profs">
                        <form class="input-append">
                            <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                        </form>
                    <br>
                    </div>
                </div>
          </div>

          <label>AND/OR...</label><br><br>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input name="notWanted" type="checkbox" value="">I do not want the following characteristics
              </label>
            </div>
          </div>

          <div class="form-group">
            <label>Select your unwanted preferences from our predefined list...</label>
            <select class="form-control">
              <option>Allergy: nuts</option>
              <option>Allergy: gluten</option>
              <option>Battery: bad</option>
              <option>Charging time: 5h</option>
              <option>Color: black</option>
              <option>Dimension: 13"</option>
              <option>Dimension: 15"</option>
              <option>Dimension: 17"</option>
              <option>Size: large</option>
              <option>Taste: sour</option>
              <option>Taste: chilli</option>
            </select>
          </div>

          <div class="form-group">
            <label>...or enter your own unwanted preferences!*</label>
            <input type="hidden" name="count" value="1" />
            <div class="control-group" id="fields">
                <div class="controls" id="profs">
                    <form class="input-append">
                        <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                    </form>
                </div>
            </div>
          </div>

          <a href="{{ route('preferences') }}">
          <button name="submitPreferences" type="submit" class="btn btn-primary my-btn">Get the results!</button>
          </a>

          <a href="{{ route('preferences') }}">
            <button type="reset" class="btn btn-primary my-btn">Reset form</button>
          </a>

        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript" src="{{ asset('/js/plusbutton.js') }}"></script>
@endpush

@endsection
