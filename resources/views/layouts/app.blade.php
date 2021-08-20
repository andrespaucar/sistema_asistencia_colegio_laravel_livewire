@extends('layouts.base')
 
@section('headApp')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('vendor/plugins/select2/css/select2.min.css')}}">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="{{asset('vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- sweetalert2 --> 
    <link rel="stylesheet" href="{{asset('vendor/plugins/sweetalert2/sweetalert2.min.css')}}">
    <!-- fullcalendar --> 
    <link rel="stylesheet" href="{{asset('vendor/plugins/fullcalendar/main.min.css')}}">
    
    @livewireStyles
@endsection
@section('body')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">
    @include('includes.main-header')
    @include('includes.main-sidebar')
    @yield('content')
    @include('includes.main-footer')
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- OverlayScrollbars --}}
    <script src="{{ asset('vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    {{-- Select2  --}}
    <script src="{{ asset('vendor/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- sweetalert2 --}}
    <script src="{{ asset('vendor/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- fullcalendar --}}
    <script src="{{ asset('vendor/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/fullcalendar/main.min.js') }}"></script>
 
    {{-- ADMIN LTE --}}
    <script src="{{ asset('vendor/js/adminlte.min.js') }}"></script>

    {{-- PRODUCTION --}}
    {{-- <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script> --}}
    
    {{-- DEVELOPER --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script>   --}}
    @livewireScripts
    <!-- alpinejs -->  
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script> 

    <!-- END: JS Assets-->
    @stack('scripts')
</body>    
@endsection