@extends('dashboardMain')
@section('title')
User Profile
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.user-profile-form')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection