@extends('dashboardMain')
@section('title')
Slider List
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.slider.slider-list')
        @include('components.dashboard.slider.slider-create')
        @include('components.dashboard.slider.slider-delete')
        @include('components.dashboard.slider.slider-update')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection