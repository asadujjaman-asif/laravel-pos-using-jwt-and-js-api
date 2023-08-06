@extends('loginMain')
@section('title')
verify OTP
@endsection
@section('content')
	@include('components.auth.verify-otp-form')
@endsection