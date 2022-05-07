<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}" class="hre">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/instamain.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/post_design.css') }}" class="hr">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" class="hr">

    @stack('styles')
</head>

<body>
    @include('shared.navbar_shared.nav')

    <main class="">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('js/instamain.js') }}" class="hre">

    @stack('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('my_scripts')

</body>

</html>
