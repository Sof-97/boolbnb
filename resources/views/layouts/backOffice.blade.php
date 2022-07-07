<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
        @yield('title')
    </title>
</head>

<header>
    @include('layouts.nav-title')
</header>

<main class="height">
    <div class="nav-flex">
        @include('layouts.navbar-top')
        @yield('content')
    </div>

</main>

<style>
    @import "../../resources/sass/app.scss";
</style>

</html>