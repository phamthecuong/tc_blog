<!DOCTYPE html><html lang="en"><head>    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <meta name="viewport" content="width=device-width, initial-scale=1">    <title>TC blog</title>    <link href="{{asset('frontEnd/css/css')}}" rel="stylesheet">    <link type="text/css" rel="stylesheet" href="{{asset('frontEnd/css/bootstrap.min.css')}}">    <link rel="stylesheet" href="{{asset('frontEnd/css/font-awesome.min.css')}}">    <link type="text/css" rel="stylesheet" href="{{asset('frontEnd/css/style.css')}}">    @yield('css')</head><body id="app"><header id="header">    @include('frontEnd.layouts.header')</header>@yield('content')<footer id="footer">    @include('frontEnd.layouts.footer')</footer><script src="{{asset('frontEnd/js/jquery.min.js')}}" type="text/javascript"></script><script src="{{asset('frontEnd/js/bootstrap.min.js')}}" type="text/javascript"></script><script src="{{asset('frontEnd/js/main.js')}}" type="text/javascript"></script><script async="" src="{{asset('frontEnd/js/js')}}" type="text/javascript"></script><script src="{{ asset('js/app.js') }}" defer></script>@yield('script')</body></html>