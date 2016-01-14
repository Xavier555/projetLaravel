@extends('layouts.menu')

@section('register')
    <li><a href="{{action('Auth\AuthController@getRegister')}}">Register</a></li>
@endsection
@extends('auth.login')

