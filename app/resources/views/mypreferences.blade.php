@extends('layouts.app')

@section('title','My preferences')

@section('content')

<div class="col-md-4 col-md-offset-4 text-center" style="margin-top: 30px;margin-bottom:30px;">
  <div class="panel-heading">
    <h4>Change/Update your preferences</h4>
  </div>

  <form class="form">
    <div class="col-md-12">
      <a href={{route('addpreferences')}} type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown">Add preferences</a>
    </div>
  </form>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel">

  	    <div class="panel-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-offset-0">

                {{ Form::open(array('url' => route('products'))) }}
                {{ csrf_field() }}

                @foreach ($user->characteristics as $characteristic)
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <h3> {{ $characteristic->category->name }}</h3>
                      <td class="col-md-6 col-md-offset-2">
                        <input type="checkbox" name="characteristic_name" value="">{{ $characteristic->name }}: {{ $characteristic->values() }}
                      </td>
                    </tr>
                  </tbody>
                </table>
                @endforeach
                <div class="col-md-12">
                  <button type="submit" class="btn btn-block btn-primary my-btn">Search by my preferences</button>
                </div>
                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>

@endsection
