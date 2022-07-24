<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="http://fonts.cdnfonts.com/css/segoe-ui-4" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
<<<<<<< HEAD
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
=======
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icona -->
    <link rel="icon" type="image/x-icon" href="href="{{ asset('icon.jpg') }}">
>>>>>>> c380dbabf8a3bf20e4187ed9292815070ddb0f31
</head>

<body>
    <div id="app">
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
