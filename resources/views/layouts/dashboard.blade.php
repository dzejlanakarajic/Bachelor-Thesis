<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IBU SDP Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/main.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div class="wrapper">
        @include('dashboard.nav.sidebar')
        <div class="main-panel">
            @include('dashboard.nav.main')
            <div class="content">
                @yield('content')
            </div>
            @include('dashboard.footer.main')
        </div>
    </div>
   
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('dashboard/js/dashboard.js') }}"></script>
    <script src="{{ asset('dashboard/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>