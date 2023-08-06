@extends('loginMain')
@section('title')
Login
@endsection
@section('content')
	@include('components.auth.login-form')
@endsection