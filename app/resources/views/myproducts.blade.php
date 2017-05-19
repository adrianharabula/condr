@extends('layouts.app')

@section('content')

<div class="container white">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>Search products...</h3>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">
      <form class="form">
        <div class="form-group col-md-12">
          <input type="text" class="form-control" id="name" placeholder="Enter the product's name">
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>
<br />

<div class="row">
@foreach ($user->products as $product)
  <div id="products" class="col-md-4 col-md-offset-4">
    <div class="table_product">
      <div class="thumbnail">
        <img class="image" src="{{ asset($product->image_url) }}" alt="" />
          <div class="caption" style="margin-left:14px;">
            <table class="products_list">
              <tbody>
                <tr>
                  <td><b>Name: </b>{{$product->name}}</td>
                  <td>  </td>
                </tr>
                <tr>
                   <td><b>Category: </b>{{$product->category->name}}</td>
                     <td>  </td>
                </tr>
                <tr>
                    <td><b>Company: </b>{{$product->company->name}}</td>
                    <td>  </td>
                </tr>
                <tr>
                    <td><b>Characteristics: </b></td>
                    @foreach ($product->characteristics as $characteristic)
                        <tr><td> {{ $characteristic->name }}: {{ $characteristic->values() }}</td></tr>
                    @endforeach
                </tr>
              </tbody>
            </table>

            <div class="row">
              <button id="principal-button" type="button" class="btn btn-block btn-primary my-btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Delete</button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <div style="font-weight:bold; font-size: 17px;text-align:center;">Are you sure that you want to delete this product?</div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button id="buton" type="button" class="btn btn-block btn-primary my-btn" data-dismiss="modal">Yes</button>
                      <button id="buton" type="button" class="btn btn-block btn-primary my-btn" data-dismiss="modal">No</button>
                    </div>
                  </div>
                </div>
              </div>
         	  </div>

        </div>
      </div>
    </div>
  </div>
@endforeach
</div>

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/products.css') }}">
@endpush

@endsection
