@extends('layouts.app')

@section('page-colors', 'bg-black white')

@section('title','Home page')

@section('content')
<div id="tf-home">
    <div class="overlay">
        <div id="sticky-anchor"></div>
        <div class="container">
            <div class="content lets-start">
                <h3 id="main-logo">ConDr</h3>
                <h3>Good decisions have never been so easy to take!</h3><br>

                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <a href={{ route('addpreferences')}} class="btn btn-primary my-btn btn-start my-btn-dropdown">Let's get started!</a>
                    <a href={{url('contact')}} class="btn btn-primary my-btn btn-start my-btn-dropdown">Contact us!</a>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="tf-service" class="bg-maroon silver">
    <div class="container">

        <div class="col-md-4">
            <div class="media">
              <div class="media-left media-middle">
                <i class="fa fa-users fa-fw"></i>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Join groups</h3>
                <p>Groups are a great way to get behind the causes you care about.</p>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="media">
              <div class="media-left media-middle">
                <i class="fa fa-bolt fa-fw"></i>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Shop Smart</h3>
                <p>Scan barcodes when shopping to learn product history & make an informed decision</p>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="media">
              <div class="media-left media-middle">
                <i class="fa fa-volume-up fa-fw"></i>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Speak up</h3>
                <p>Get your message across by notifying the product owners of your decision</p>
              </div>
            </div>
        </div>

    </div>
</div>
@endsection
