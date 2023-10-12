<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('print_script')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('shared.meta')
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/e27bdb27e2.js" crossorigin="anonymous"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('top-javascript')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    @yield('styles')
    <style type="text/css">
        body {
            padding-top: 80px;
            background-image: url("{{ asset('images/background2.png') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
</head>

<body id="body-pd" class="body-pd">
    @include('layouts.dashboard-header')
    @include('layouts.dashboard-sidebar')
    <div class="height-100">
        <div class="pb-5">
            @yield('content')
        </div>
    </div>
    @include('shared.socket')
    @include('shared.cookie')
    @yield('javascript')
</body>

</html>
