@extends('layouts.base')

@section('body')
<body class="hold-transition login-page">
    {{-- <div class="wrapper">
    @include('includes.main-header')
    @include('includes.main-sidebar') --}}
    @yield('content')
    {{-- @include('includes.main-footer') --}}
    {{-- </div> --}}
    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script>

    <!-- END: JS Assets-->
    @yield('script')
</body>    
@endsection