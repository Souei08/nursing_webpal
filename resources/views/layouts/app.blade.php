<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
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
    @yield('styles')
    <style type="text/css">
      body {
        padding: 0px; 
        background-image: url("{{ asset('images/background2.png')  }}");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
      }
      #navbar-example2 {
        background-color: #5a457b !important;
      }
    </style>
  </head>
  <body>
    <div id="app">
      @include('layouts.app-nav', [
        'dashboard' => false
      ])
      <main id="content">
        <div class="app-main">
          @yield('content')
        </div>
      </main>
      @include('layouts.footer')
    </div>
    <div id="loading" class="d-none">
      <div id="loading-image">
        <h1><i class="fas fa-spinner"></i></h1>
      </div>
    </div>
    @include('shared.socket')
    @include('shared.cookie')
    @yield('javascript')
  </body>
</html>
