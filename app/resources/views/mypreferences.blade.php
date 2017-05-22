@extends('layouts.app')

@section('title','My preferences')

@section('content')

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel">

  	   <div class="panel-heading">
  	      <h4>Change/Update your preferences</h4>
  	    </div>

  	    <div class="panel-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-offset-0">

                @foreach ($user->characteristics as $characteristic)
                <table class="table table-hover">
                  <tbody>
                    <tr>
  									  <td class="col-md-6 col-md-offset-2">
                        <h5> {{ $characteristic->name }}: {{ $characteristic->values() }}</h5>
                      </td>
  				            {{-- <td class="col-md-0">
                        <div class="col-md-offset-2">
                           <br><a href="delete.php" style="color:green"><b><h5>Delete</h5></b></a>
                        </div>
                      </td> --}}
                    </tr>
                  </tbody>
                </table>
                @endforeach

              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>

@endsection
