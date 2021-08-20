<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="{{asset('images/logo.ico')}}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('vendor/plugins/fontawesome-free/css/all.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     
    @yield('headApp')
 
    <link rel="stylesheet" href="{{asset('vendor/css/adminlte.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    @yield('head')
</head>
@yield('body')
</html>