@extends('layouts.app')

@section('content')

@foreach($users as $user)

<h1><a href=" {{ route('profile.show', $user->name) }} ">{{ $user->name }}</a></h1>

@endforeach

@endsection




