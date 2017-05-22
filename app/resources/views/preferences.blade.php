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
            <input name="companyName" type="text" class="form-control">
          </div>

          <div class="form-group checkbox">
            <label>
              <input name="addProductToHistory" type="checkbox">Add product to my history
            </label>
          </div><br><br>
        </div>

        <div class="col-md-7 col-md-offset-1">
          <a href={{ route('suggestion') }} name="submitPreferences" type="submit" class="btn btn-primary my-btn"> Get the results! </a>
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
