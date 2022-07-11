<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Welcome Page</title>
</head>

<body>
@include('layouts.nav-index')
    <div id="root"></div>
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
