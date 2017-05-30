@extends('layouts.app')

@section('title','My products')

@section('content')

<div class="panel-heading text-center">
  <h3><b>Your selected products</b></h3>
</div>

<div class="container">

  @if(Session::has('message'))
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissable">
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
  @foreach ($products as $product)
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
                      <td><b>Company: </b>{{$product->company->name}}</td>
                      <td>  </td>
                  </tr>
                  <tr>
                      <td><b>Characteristics: </b></td>
                      @foreach ($product->characteristics as $characteristic)
                          <tr><td> {{ $characteristic->name }}: {{ $characteristic->votes()->first()->vote }}</td></tr>
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
  @endforeach
  </div>
</div>

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/products.css') }}">
@endpush
<style>
.thumbnail {
  border: 2px solid #2F937B;
}
</style>

@endsection
