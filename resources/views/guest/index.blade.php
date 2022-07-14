<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- TomTom Map API --}}
        <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps.css'>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps-web.min.js"></script>

    <title>Welcome Page</title>
    @if ($user)
        <script>
            window.user = "{{ $user->email }}"
        </script>
    @endif
</head>

<body>
    @include('layouts.nav-index')
    <div id="root"></div>
    @include('layouts.footer')
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
