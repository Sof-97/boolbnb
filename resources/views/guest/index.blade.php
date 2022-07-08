<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <title>Wellcome page</title>
</head>
<body>
    <nav>
        <div class="index-nav-img">
            <img src="{{asset("img/airbnb-logo.png")}}" alt="Logo">
            <div class="index-title">
                BoolBnB
            </div>
        </div>
    </nav>
    <div class="index-line"></div>
    <h2 class="index-title">Wellcome on BoolBnB</h2>
    <div id="root">

    </div>
    <script src="{{asset('js/front.js')}}"></script>
</body>
</html>


<style>
.index-nav-img{
    padding: 20px;
    display: flex;
    align-items: center;
    font-size: 32px;
    font-weight:700
}

.index-nav-img, img{
    width: 60px;
    padding-right: 16px
}

.index-title{
    text-align: center;
    color: red;
    font-weight:700;
}

.index-line{
    border-bottom: 1px grey solid;
    width: 80%;
    margin: 0 auto;
    margin-bottom: 16px;
}

</style>
