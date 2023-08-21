@extends('dashboardMain')
@section('title')
Brand List
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.brand.brand-list')
        @include('components.dashboard.brand.brand-create')
        @include('components.dashboard.brand.brand-delete')
        @include('components.dashboard.brand.brand-update')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection