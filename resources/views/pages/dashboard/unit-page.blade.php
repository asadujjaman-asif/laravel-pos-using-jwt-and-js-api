@extends('dashboardMain')
@section('title')
Unit List
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.unit.unit-list')
        @include('components.dashboard.unit.unit-create')
        @include('components.dashboard.unit.unit-delete')
        @include('components.dashboard.unit.unit-update')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection