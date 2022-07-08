<!DOCTYPE html>
<html class="page-height" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
        @yield('title')
    </title>
</head>

<body>

    <header>
        @include('layouts.nav-title')
    </header>

    <main class="main-page" style="min-height: 100%">
        <div class="nav-flex">
            @include('layouts.navbar-side')
            @yield('content')
        </div>
    </main>



</body>

</html>
