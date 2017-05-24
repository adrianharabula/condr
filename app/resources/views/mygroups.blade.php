@extends('layouts.app')

@section('title','My groups')

@section('content')

 <div class="row">
   <div class="col-md-8 col-md-offset-2">
   	  <div class="panel">
   	     <div class="panel-heading text-center">
   	     <h3><b>Delete/Update your joined groups!</b></h3>
   	     </div>
         @foreach ($groups as $group)
   	      <div class="container">
            <div class="row">
              <div class="col-md-6">
                 <h4><b>Name : </b><span>{{ $group->name }}</span></h4>
                 <h4><b>Description : </b><span>{{ $group->description}}</span></h4>
               </div>
               <div class="col-md-2">
                 <a href={{route('groupdelete', $group->id)}} class="btn btn-primary my-btn btn-start my-btn-dropdown">Delete</a>
               </div>
               <div class="col-md-2">
                 <a href={{ route('products') }} class="btn btn-primary my-btn btn-start my-btn-dropdown">View products</a>
               </div>
              </div>
            </div>
          @endforeach
        </div>
     </div>
  </div>
</div>

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
.col-md-2 {
  margin-top: 17px;
}
</style>

@endsection
