@extends('layouts.app')

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
   				                                    <br><a href="preferences.php" style="color:green"><b><h5>Add preferences</h5></b></a>
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

     <nav aria-label="Product navigation" class="text-center">
      <ul class="pagination">
        <li class="page-item {{ $groups->currentPage() === 1 ? 'hidden' : '' }}">
          <a class="page-link" href={{ route('mygroups') }} tabindex="-1">First</a>
        </li>
        {{-- <li class="page-item {{ $groups->currentPage() === 1 ? 'hidden' : '' }}">
          <a class="page-link" href= {{ route('mygroups', ['page'=>$groups->currentPage()-1]) }} tabindex="-1">Previous</a>
        </li> --}}
      </ul>
    </nav>

  </div>
</div>




@endsection
