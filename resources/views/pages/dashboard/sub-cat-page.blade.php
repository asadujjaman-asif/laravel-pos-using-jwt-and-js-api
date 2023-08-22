@extends('dashboardMain')
@section('title')
SUb category list
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.subCat.sub-cat-list')
        @include('components.dashboard.subCat.sub-cat-create')
        @include('components.dashboard.subCat.sub-cat-delete')
        @include('components.dashboard.subCat.sub-cat-update')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection