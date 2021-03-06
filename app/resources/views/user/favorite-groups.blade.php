@extends('layouts.app')

@section('title','My groups')

@section('content')

 <div class="row">
   <div class="col-md-8 col-md-offset-2">
   	  <div class="panel">
   	     <div class="panel-heading text-center">
   	       <h3><b>Delete/Update your joined groups!</b></h3>
   	     </div>
         <br/><br/>
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
         @forelse ($groups as $group)
   	      <div class="container">
            <div class="row">
              <div class="col-md-6">
                 <h4><b>Name : </b><span>{{ $group->name }}</span></h4>
                 <h4><b>Description : </b><span>{{ $group->description}}</span></h4>
               </div>
               <div class="col-md-2">
                  {!! Form::open(['method' => 'DELETE', 'url'=> route('my.group.delete', $group->id)]) !!}
                    <button type="submit" class="btn btn-primary my-btn btn-start my-btn-dropdown">Delete</button>
                  {!! Form::close() !!}
               </div>
               <div class="col-md-2">
                  {!! Form::open(['method' => 'GET', 'url'=> route('products.listproducts')]) !!}
                    <button type="submit" class="btn btn-primary my-btn btn-start my-btn-dropdown">View products</button>
                  {!! Form::close() !!}
               </div>
              </div>
            </div>
          @empty
            <div class="col-md-12 text-center">
              <h4>Unfortunatelly, you haven't joined any group yet!....</h4>
              <h4>You can click <a href="{{ route('groups.listgroups')}}" style="font-size: 20px;">here</a> to join some!  <i class="fa fa-smile-o"></i></h4>
            </div><br>
          @endforelse
        </div>
     </div>
  </div>
  <br/><br/>
<style>
.row {
    margin-right: 0px;
    margin-left: 0px;
    margin-top: 5px;
    margin-bottom: 5px;
}
.container {
  margin-top: 10px;
  margin-bottom: 5px;
}
b {
  color:#2F937B;
}
h4 {
  margin: 25px;
  font-size:19px;
}
.col-md-2 {
  margin-top: 17px;
}
</style>

@endsection
