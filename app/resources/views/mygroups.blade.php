@extends('layouts.app')

@section('title','My groups')

@section('content')

 <div class="row">
   <div class="col-md-6 col-md-offset-3 ">
   	  <div class="panel">
   	     <div class="panel-heading">
   	      <h4><b>Change/Update your joined groups!</b></h4>
   	     </div>
   	     <div class="panel-body">
         @foreach ($groups as $group)
   	      <div class="container">
                   <div class="row">
                       <div class="col-md-6 col-md-offset-0">
                           <table class="table table-hover">
                               <tbody>
                                   <tr>
   									                  <td class="col-sm-8 col-md-6 col-md-offset-2">
                                               <h5><b>Name : </b><span>{{ $group->name }}</span></h5>
                                               <h5><b>Description : </b><span>{{ $group->description}}</span></h5>
                                       </td>
                                       <td class="col-md-0">
   				                                <div class=" col-md-offset-2">
   				                                    <br><a href="delete.php" style="color:green"><h5>Delete </h5></b></a>
   				                                </div>
   				                            </td>
                                       <td class="col-md-0">
   				                                <div class="col-md-offset-2">
   				                                    <br><a href={{ route('products') }} style="color:green"><b><h5>View products</h5></b></a>
   				                                </div>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
          @endforeach
        </div>
     </div>


  </div>
</div>




@endsection
