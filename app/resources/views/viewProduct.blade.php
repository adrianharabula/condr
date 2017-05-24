@extends('layouts.app')

@section('title','View product')

@section('content')

  @if(Session::has('status'))

    <div class="row">
      <div class="col-md-4 col-md-offset-4" style="margin-top: 40px;">
        <div class="panel panel-success">
          <div class="panel-heading">{{ Session::get('status') }}</div>
        </div>
      </div>
    </div>
  @endif

  <div class="container">
    <div class="row page black">
      <div class="panel panel-info">
        <div class="panel-heading text-center">
          <h1>{{ $product->name}}</h1>
        </div>

        <div class="panel-body">
          <div class="col-md-3">
            <a class="thumbnail pull-left"> <img class="media-object" src="{{ asset($product->image_url) }}" style="width:100%;"> </a>
          </div>
          <div class="col-md-5">
            <h4>Product name: {{ $product->name }}</h4>
            <h5>by {{ $product->company->name }} </h5>
            <h4>Product category</h4>
            <h5>{{ $product->category->name }}</h5>

            <h4>Characteristics of the product:</h4>
            @forelse ($product->characteristics as $characteristic)
                <h5>
                  <button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" title="Add me to your preferences!">
                    <i class="glyphicon glyphicon-heart"></i>
                  </button>
                   {{ $characteristic->name }}: {{ $characteristic->values() }}</h5>
            @empty
                <h5> None </h5>
            @endforelse
          </div>
          {{Form::open(array('url' => route('addproduct',$product->id)))}}
          {{ csrf_field() }}
          <div class="col-md-3">
            <button class="btn btn-primary my-btn btn-start my-btn-dropdown">Add product to my history!</button>
          </div>
          {{Form::close()}}
        </div>
      </div>
    </div>
  </div>

  <style>

  .btn-circle {
    width: 25px;
    height: 25px;
    text-align: center;
    padding: 6px 0;
    font-size: 10px;
    line-height: 1.428571429;
    border-radius: 15px;
  }
  .panel-heading {
    text-align: center;
  }
  h4 {
  margin-bottom: 7px;
  font-size: 18px;
  font-weight: 600;
  color: #2F937B;
  }
  h5 {
    margin-bottom: 25px;
  }
  .panel-info>.panel-heading {
    color: white;
    background-color: #85144B;
    border-color: #bce8f1;
  }
  </style>


@endsection
