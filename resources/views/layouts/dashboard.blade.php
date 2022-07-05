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

<body>
    <div class="float-right">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn" type="submit">Logout</button>
        </form>
    </div>
    @yield('content')
</body>

</html>
