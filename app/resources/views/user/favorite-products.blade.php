@extends('layouts.app')

@section('title','My products')

@section('content')

<div class="panel-heading text-center">
  <h3><b>Your selected products</b></h3>
</div>
<br><br>
<div class="container">

  @if(Session::has('message'))
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissable" style="text-align: center;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          @if(Session::get('alert-class') === 'alert-danger')
            <strong>Error: </strong>
          @else
            <strong>Success: </strong>
          @endif
          {{ Session::get('message') }}
        </div>
      </div>
    </div>
  @endif

  <div class="row">
  @forelse ($products as $product)
    <div class="col-md-4">
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
                      <td><b>Brand: </b>{{$product->brand}}</td>
                      <td>  </td>
                  </tr>
                  <tr>
                      <td><b>Characteristics: </b></td>
                      @foreach ($product->characteristics as $characteristic)
                          <tr><td> <i class="fa fa-heart"></i> {{ $characteristic->name }}: {{ $characteristic->pivot->cvalue }}</td></tr>
                      @endforeach
                  </tr>
                </tbody>
              </table>

              <div class="row">
                <div class="col-md-11">
                  <button id="principal-button" type="button" class="btn btn-block btn-primary my-btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Delete</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">

                        <div class="modal-body">
                          {{Form::open(array('method' => 'DELETE', 'url'=> route('my.product.delete', $product->id)))}}
                          {{ csrf_field() }}
                            <div class="form-group">
                              <div style="font-weight:bold; font-size: 17px;text-align:center;">Are you sure that you want to delete this product?</div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-block btn-primary my-btn">Yes</button>
                              <button id="buton" class="btn btn-block btn-primary my-btn" data-dismiss="modal">No</button>
                            </div>
                          {{Form::close()}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
           	  </div>
          </div>
        </div>
      </div>
    </div>
  @empty
    <div class="col-md-8 col-md-offset-3">
      <h4>Unfortunatelly, you have no products in your basket!...</h4>
      <h4>But you can click <a href="{{ route('products.listproducts')}}" style="font-size: 20px;">here</a> to search and add some!  <i class="fa fa-smile-o"></i></h4>
    </div><br>
  @endforelse
  </div>
</div>
<br><br>

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/products.css') }}">
@endpush
<style>
b {
  color:#2F937B;
}
h4 {
  font-size: 20px;
}
.fa-heart {
  color: #2F937B;
}
.thumbnail {
  border: 2px solid #2F937B;
}
</style>

@endsection
