@extends('layouts.app')

@section('title','Add product!')

@section('content')

<div class="container contact">
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h4><b>Help us enlarge our community by adding relevant products!</b></h4>
    </div>
    <div class="panel-body">
      <div class="col-md-8 col-md-offset-2 text-center">
      <h4>Pay attention! The barcode must consist of 13 digits, otherwise we won't be able to find your product!</h4>
    </div><br/><br/>
      <div class="col-md-4 col-md-offset-4">
        <div class="form-group">
          {{ Form::open(array('url' => route('products.submitAdd'))) }}
          {{ csrf_field() }}
          <input class="form-control" name="barcode" placeholder="Type the product's barcode"><br/>
          <button type="submit" class="btn btn-primary my-btn btn-block">Add product to database!</button>
          {{ Form::close() }}
        </div>
    </div>
  </div>
</div>

<style>
 h4 {
   font-size: 19px;
   margin-top: 20px;
 }
 .panel.panel-default {
   margin-top:30px;
 }
 .panel-body {
   margin-top: 30px;
 }
 .form-control {
   height: 39px;
 }
</style>

@endsection
