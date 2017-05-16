@extends('layouts.app')

@section('content')

 Hello, {{ $user->name }}.
 @foreach ($groups as $group)
    <p>This is group {{ $group->name }} with the description {{ $group->description}}.</p>
 @endforeach

@endsection
