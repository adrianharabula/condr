@extends('layouts.app')

@section('title','Preferences page')

@section('content')

<div class="container contact">
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h4>Search products and see if they match your preferences!</h4>
    </div>
    <div class="panel-body">
      <div class="col-md-8 col-md-offset-2">
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

        <div class="col-md-6 col-md-offset-3">
          {{-- <a href={{ route('suggestion') }} name="submitPreferences" type="submit" class="btn btn-primary my-btn"> Get the results! </a> --}}
          <a href="{{ route('suggestion') }}" class="col-md-6">
            <button type="submit" class="btn btn-primary my-btn btn-block">Get the results!</button>
          </a>
          <a href="{{ route('preferences') }}" class="col-md-6">
            <button type="submit" class="btn btn-primary my-btn btn-block">Reset form</button>
          </a>
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
</style>

@endsection
