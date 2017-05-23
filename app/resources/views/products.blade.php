@extends('layouts.app')

@section('title','Products list')

@section('page-colors','bg-black white')

@section('content')

<div class="container page white">
    <div class="row">
      <div class="col-md-12 text-center">
          <h2>A few products...</h2>
      </div>
</div>

    <div class="row">
      <div class="col-md-push-8 col-md-4 black">
        <div class="panel panel-info">
          <div class="panel-heading text-center">Search for products!</div>
          <div class="panel-body">
            <div class="row">
                {{ Form::open(array('url' => route('products'))) }}
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                  <input type="text" class="form-control full-width" name="product_name" placeholder="Enter product name">
                </div>
                {{-- <div class="form-group col-md-12">
                  <b>Filter by</b>: <br/>
                  <label class="radio-inline"><input type="radio" name="optradio" checked="checked">Name</label>
                  <label class="radio-inline"><input type="radio" name="optradio">Category</label>
                  <label class="radio-inline"><input type="radio" name="optradio">Company</label>
                </div> --}}
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary my-btn btn-block">Search</button>
                  <br/>
                </div>
               {{Form::close()}}
            </div>
          </div>
        </div>
      </div>

     <div class="col-md-8 col-md-pull-4">
        @forelse ($products as $product)
        <div class="row">
            <div class="col-md-9">
              <div class="media">
                  <a class="thumbnail pull-left">
                     <img class="media-object" src="{{ asset($product->image_url) }}" style="width: 72px; height: 72px;">
                   </a>
                  <div class="media-body" style="padding-left: 10px; padding-top: 2px;">
                     <h5><b>Name : </b><span>{{ $product->name }}</span></h5>
                     <h5><b>Description : </b><span>{{ $product->description}}</span></h5>
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href={{ route('viewproduct', $product->id) }} class="btn btn-primary my-btn my-btn-dropdown btn-block btn-product pull-right">View details</a>
            </div>
        </div>
      @empty
        <div class="row page black">
          <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger">
                <ul>
                  <li> Oups! We haven't found any product in our database...</li>
                </ul>
            </div>
          </div>
        </div>
      @endforelse
  </div>
</div>

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/products.css') }}">
@endpush

@endsection
