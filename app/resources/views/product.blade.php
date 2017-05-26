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
      <div class="panel panel-default panel-product">
        <div class="panel-heading text-center">
          <div class="row">
            <div class="col-md-6 text-left">
              <h1>{{ $product->name}}</h1>
            </div>
            <div class="col-md-6 text-right">
              {{Form::open(array('url' => route('addproduct', $product->id)))}}
              {{ csrf_field() }}
                <div class="">
                  <button class="btn btn-primary my-btn btn-start my-btn-dropdown my-btn-border"><i class="fa fa-save"></i> Save for later</button>
                </div>
              {{Form::close()}}
            </div>
          </div>
        </div>

        <div class="panel-body">
          <div class="col-md-3">
            <a class="thumbnail pull-left"> <img class="media-object" src="{{ asset($product->image_url) }}" style="width:100%;"> </a>
          </div>
          <div class="col-md-9">
            <h4>Product name: {{ $product->name }}</h4>
            <h5>by {{ $product->company->name }} </h5>
            <h4>Product category</h4>
            <h5>{{ $product->category->name }}</h5>

            <h4>Characteristics of the product:</h4>
            @forelse ($product->characteristics as $characteristic)

              {{ Form::open(array('url'=>route('addcharacteristics', $characteristic->id))) }}
              {{ csrf_field() }}
                  <button class="btn btn-danger btn-circle" data-toggle="tooltip" title="Add me to your preferences!">
                    <span class="fa fa-heart"></span>{{ $characteristic->name }}: {{ $crv->values($characteristic, $product) }}
                  </button>
              {{ Form::close() }}
            @empty
                <h5> None </h5>
            @endforelse

          </div>

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

  button.btn.btn-primary.my-btn.my-btn-border, a.btn.btn-primary.my-btn.my-btn-border {
    border: 1px solid #2F937B;
  }

  button.btn.btn-primary.my-btn.my-btn-border:hover, a.btn.btn-primary.my-btn.my-btn-border:hover {
    border: 1px solid #fff;
  }

  .panel-product {
    /*text-align: center;*/
    border-color: #85144b;
  }

  .panel-product h1 {
    margin: 10px 0;
    font-size: 25px;
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

  .panel-product>.panel-heading {
    color: white;
    background-color: #85144B;

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
