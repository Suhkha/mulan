<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin-theme.css') }}" rel="stylesheet">
</head>
<body>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/admin-vendor.min.js') }}"></script>
</body>
</html>
