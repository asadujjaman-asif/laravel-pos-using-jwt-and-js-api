
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>POS | @yield('title')</title>
	<link rel="stylesheet" href="{{asset('assets/backend/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/loader.css')}}">
	<link rel="stylesheet" href="{{asset('assets/backend/css/message.css')}}">
	<script src="{{asset('assets/backend/js/axios.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/common.js')}}"></script>
</head>
<body>
	@yield('content')
    @include('components.preloader')
	@include('components.success-message')
</body>
</html>