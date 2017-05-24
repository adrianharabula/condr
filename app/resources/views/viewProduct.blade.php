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
            <a class="thumbnail pull-left" href="{{ asset($product->image_url) }}"> <img class="media-object" src="{{ asset($product->image_url) }}" style="width:100%;"> </a>
          </div>
          <div class="col-md-6">
            <h4>Product name: {{ $product->name }}</h4>
            <h5>by {{ $product->company->name }} </h5>
            <h4>Product category</h4>
            <h5>{{ $product->category->name }}</h5>

            <h4>Characteristics of the product:</h4>
            @forelse ($product->characteristics as $characteristic)

                <h5> {{ $characteristic->name }}: {{ $characteristic->values() }}</h5>

              {{Form::open(array('url'=>route('addcharacteristics',$characteristic)))}}
              {{ csrf_field() }}
                <h5>
                  <button class="btn btn-danger btn-circle" data-toggle="tooltip" title="Add me to your preferences!">
                    <span class="glyphicon glyphicon-heart"></span>{{ $characteristic->name }}: {{ $characteristic->values() }}
                  </button>

            @empty
                <h5> None </h5>
            @endforelse
            {{Form::close()}}

          </div>
          {{Form::open(array('url' => route('addproduct',$product->id)))}}
          {{ csrf_field() }}
          <div class="col-md-3">
            <button class="btn btn-primary my-btn btn-start my-btn-dropdown">Add product!</button>
          </div>
          {{Form::close()}}
        </div>
      </div>
    </div>
  </div>

  <style>

  .btn-circle {
    width: 57%;
    height: 35px;
    text-align: center;
    font-size: 14px;
    line-height: 1.428571429;
    border-radius: 2px;
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
  :after, :before {
    margin-right: 20px;
  }
  .btn-danger {
    color: #fff;
    background-color: #85144B;
    border-color: #85144B;
  }
  .btn-danger:hover{
    color: white;
    background-color: #2F937B;
    border-color: #2F937B;
  }


  </style>

@endsection
