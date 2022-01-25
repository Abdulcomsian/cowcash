<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" id="bootstrap-stylesheet" data-version="1.1.0" href="{{asset('styles/bootstrap.min.css')}}">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('styles/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('styles/extras.1.1.0.min.css')}}">
    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    @toastr_css
    @yield('css')
</head>

<body class="h-100" style="overflow-x:hidden !important;">


    @include("layouts.header")
    @include("layouts.sidebar")

    @yield('content')

    @include('layouts.footer')


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="{{asset('scripts/bootstrap.min.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{--<script src="{{asset('scripts/Chart.bundle.js')}}"></script>--}}
    <script src="{{asset('scripts/shards.min.js')}}"></script>
    <script src="{{asset('scripts/jquery.sharrre.min.js')}}"></script>
    {{--<script src="{{asset('scripts/dashboards.1.1.0.min.js')}}"></script>--}}
    {{--<script src="{{asset('scripts/app/app-chart.js')}}"></script>--}}
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    @toastr_js
    @toastr_render
    @yield('script')



    
</body>

</html>