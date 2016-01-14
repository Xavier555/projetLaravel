@extends('layouts.app')
@extends('layouts.menu')

@section('register')
    <li><a href="{{action('Auth\AuthController@getRegister')}}">Register</a></li>
@endsection

@section('content')
    <strong>Author</strong> : Xavier Omey
@endsection

