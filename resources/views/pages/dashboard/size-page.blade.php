@extends('dashboardMain')
@section('title')
Size List
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.size.size-list')
        @include('components.dashboard.size.size-create')
        @include('components.dashboard.size.size-delete')
        @include('components.dashboard.size.size-update')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection