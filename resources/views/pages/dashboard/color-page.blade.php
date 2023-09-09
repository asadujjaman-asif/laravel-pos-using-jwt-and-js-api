@extends('dashboardMain')
@section('title')
Color List
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.color.color-list')
        @include('components.dashboard.color.color-create')
        @include('components.dashboard.color.color-delete')
        @include('components.dashboard.color.color-update')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection