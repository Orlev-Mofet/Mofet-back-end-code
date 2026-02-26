<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>{{config("app.name")}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">

    <!-- Bootstrap CSS -->
    {{-- <link href="{{ mix('css/admin/auth.css') }}" rel="stylesheet"> --}}
    @vite('resources/css/admin/auth.css')

    <title>@yield('title')</title>
</head>

<body>

    <div id="app">
        @yield('content')
    </div>

</body>

</html>
