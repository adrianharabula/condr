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
                {{ Form::open(array('url' => route('products.listproducts'))) }}
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                  <input type="text" class="form-control full-width" name="product_name" placeholder="Enter product name">
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary my-btn btn-block">Search</button>
                  <br/>
                </div>
               {{Form::close()}}
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading text-center">Add product</div>
          <div class="panel-body">
            <div class="row">
                {{ Form::open(array('url' => route('product.submitAdd'))) }}
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                  <input class="form-control" name="upc_code" placeholder="Type the product's barcode">
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary my-btn btn-block">Add product to database!</button>
                  <br/>
                </div>
                {{ Form::close() }}
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
                     <h5><span style="font-size:19px;">{{ substr($product->name,0,140) }}....</span></h5>
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <a href={{ route('products.singleview', $product->id) }} style="margin-top: 10px;" class="btn btn-primary my-btn my-btn-dropdown btn-block btn-product pull-right">View details</a>
            </div>
        </div>
      @empty
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger">
                <ul>
                  <li> Oups! We haven't found any product in our database...</li>
                </ul>
            </div>
          </div>
        </div><br />
        <div class="col-md-8 col-md-offset-2 text-center">
          <h4 style="font-size: 22px;"> Would you like to add a product by its barcode instead?</h4>
          {{ Form::open(array('url' => route('product.add'))) }}
          {{ csrf_field() }}
            <button type="submit" class="btn btn-primary my-btn btn-block">Sure, why not? <i class="fa fa-heart"></i></button>
          {{ Form::close()}}
        </div>
      @endforelse
  </div>
</div>
{{-- $products->links() --}}
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/products.css') }}">
@endpush

@endsection
