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

<div class="page-height">


<header>
    @include('layouts.nav-title')
</header>

<main class="height">
    <div class="nav-flex">
        @include('layouts.navbar-top')
        @yield('content')
    </div>

</main>

</div>

<style>
    @import "../../resources/sass/app.scss";
</style>

</html>