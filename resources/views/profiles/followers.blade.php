@extends('layouts.app')

@section('content')

@foreach($followers as $follower)

<h1><a href=" {{ route('profile.show', $follower->name) }} "> {{ $follower->name }} </a></h1>

@endforeach

@endsection




