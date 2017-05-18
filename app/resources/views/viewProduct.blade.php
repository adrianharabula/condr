@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row page black">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h1>{{ $product->name}}</h1>
        </div>

        <div class="panel-body">
          <div class="col-md-3">
            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="/Assets/img/Product-Icon.png" style=""> </a>
          </div>
          <div class="col-md-9">
            <h4>Product name: {{ $product->name }}</h4>
            <h5>by {{ $product->company->name }} </h5>
            <h4>Product category</h4>
            <h5>{{ $product->category->name }}</h5>
            <h4>Characteristics of the product:</h4>
            {{-- @foreach ($product->characteristics() as $characteristic)
                <h5> {{ $characteristic->characteristic_values }}</h5>
            @endforeach --}}

          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
