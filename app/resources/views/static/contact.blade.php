@extends('layouts.app')

@section('title', 'Contact')

@section('content')

@if (count($errors) > 0)
  <div class="row page black">
    <div class="col-md-4 col-md-offset-4">
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
  </div>
@endif
  
<div class="container">
  <div class="row black">
    {{ Form::open(['url' => route('contact'), 'method' => 'post', 'id' => 'contact']) }}
      {{ csrf_field() }}
      <h3>ConDr Contact Form</h3>
      <h4>Tell us what you think! Your opinion matters!</h4>
      <fieldset>
        <input placeholder="Your name" type="text" name="name" value="{!! old('name') !!}" tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <input placeholder="Your Email Address" type="email" name="email" value="{!! old('email') !!}" tabindex="2" required>
      </fieldset>
      <fieldset>
        <input placeholder="Your Phone Number (optional)" type="tel" name="phone" value="{!! old('phone') !!}" tabindex="3">
      </fieldset>
      <fieldset>
        <input placeholder="Your Web Site (optional)" type="url" name="website" value="{!! old('website') !!}" tabindex="4">
      </fieldset>
      <fieldset>
        <textarea placeholder="Type your message here...." tabindex="5" name="message" value="{!! old('message') !!}" required></textarea>
      </fieldset>
      <fieldset>
        <button name="Submit" type="submit" class="btn btn-block btn-primary my-btn btn-start my-btn-dropdown" id="contact-submit" data-submit="...Sending">Submit</button>
      </fieldset>
    {{ Form::close()}}
  </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/contact.css') }}">
@endpush
