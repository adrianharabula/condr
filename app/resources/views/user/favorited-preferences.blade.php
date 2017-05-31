@extends('layouts.app')

@section('title','My preferences')

@section('content')

<div class="col-md-4 col-md-offset-4 text-center" style="margin-top: 30px;margin-bottom:30px;">
  <div class="panel-heading">
    <h4><b>Change/Update your preferences</b></h4>
  </div>

  <form class="form">
    <div class="col-md-12">
      <a href={{route('my.preferences.addbyyourself')}} type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Add preferences</a>
    </div>
  </form>
</div>

<div class="row">
  <div class="col-md-10 col-md-offset-2">
    <div class="panel">

  	    <div class="panel-body">
          <div class="container">
            <div class="row">
              <div class="col-md-10">

                {{ Form::open(array('url' => route('products.listproducts'))) }}
                {{ csrf_field() }}

                @foreach ($preferences as $preference)
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <h3> {{ $preference->category->name }}</h3>
                      <div class="col-md-10">
                        <input type="checkbox" name="characteristic_name" value="">{{ $preference->name }}: {{ $preference->values}}
                      </div>
                    </tr>
                  </tbody>
                </table>
                @endforeach

                <div class="col-md-6">
                  <button type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Search by selected preferences</button>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Delete selected preferences</button>
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
h4 {
  font-size: 20px;
}
</style>

@endsection
