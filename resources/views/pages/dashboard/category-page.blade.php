@extends('dashboardMain')
@section('title')
Category List
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.category.category-list')
        @include('components.dashboard.category.category-create')
        @include('components.dashboard.category.category-update')
        @include('components.dashboard.category.category-delete')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection