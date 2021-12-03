<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset("css/Style.css") }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Bootstrap Bundle JS (jsDelivr CDN) -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body>
<div id="home">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarText">
            <img src="{{asset('asa.png')}}" class="rounded" height="20" width="20">
            <p style="margin-top: 0.8%">Пиццерия</p>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 80%">
                <li class="nav-item" style="horiz-align: center">
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Orders">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Авторизация</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<img src="{{asset('asa.png')}}" style="margin-top: 2%" class="rounded mx-auto d-block"  height="230" width="1000">
<main>
    @yield('mainContent')
</main>
</div>

</body>
</html>

