<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.rtl.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/dashboard.css')}}">
</head>
<body>


        <x-header />
    <div class="container-fluid">
        <div class="row">
          <x-sidebar />
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">{{__('views/layout.dashboard')}} </h1>
            </div>
            @if(Session::has('success'))

            <div class="alert alert-success ">
            {{Session::get('success')}}
            </div>
            @endif


            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif
            @yield('content')

        </div>
        </div>
            <script src="{{URL::asset('javascript/bootstrap.min.js')}}"></script>
              <script src="{{URL::asset('javascript/dashboard.js')}}"></script>

</body>
</html>
