<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../ico/Screenshot_2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/style.css">
    <title>LikeMebel</title>
</head>

<body class="text-bg-dark">
<header class="p-3 text-bg-dark">
    <div class="header">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none logo">
                <p class="yellow">L</p>ike<p class="yellow">M</p>ebel
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Главная</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Услуги
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('services') }}">Весь список</a></li>
                        @foreach($services as $service)
                            <li><a class="dropdown-item" href="/service/{{$service['id']}}">{{$service['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('reviews')}}" class="nav-link px-2 text-white">Отзывы</a></li>
                <li><a href="{{ route('news') }}" class="nav-link px-2 text-white">Новости</a></li>
                <li><a href="{{ route('contacts') }}" class="nav-link px-2 text-white">Контакты</a></li>
            </ul>

            <div class="text-end">
                @guest
                    <a href="{{route('signup')}}" type="button" class="btn btn-outline-light me-2">Регистрация</a>
                    <a href="{{route('login')}}" type="button" class="btn btn-warning">Вход</a>
                @endguest
                @auth
                    <div class="d-flex">
                        <a href="{{route('thisUser')}}" class="me-5"><h5 class="me-2 mt-2">{{auth()->user()->name}}</h5></a>
                        <a href="{{route('logout')}}" class="not btn btn-warning me-2">Выйти </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $massage)
                <li>{{ $massage }}</li>
            @endforeach
        </div>
    @endif

</header>
<div class="content">
    @yield('content')
</div>
<div class="footer">
    <footer class="d-flex text-bg-dark flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-white text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-white">© 2023 LikeMebel (Все права защищены)</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-white" href="https://vk.com"><img src="../ico/free-icon-vk-3670055.png"
                                                                              alt=""></a></li>
            <li class="ms-3"><a class="text-white" href="https://telegram.com"><img
                        src="../ico/free-icon-telegram-2111646.png" alt=""></a></li>
            <li class="ms-3"><a class="text-white" href="https://instagram.com"><img
                        src="../ico/free-icon-instagram-3955024.png" alt=""></a></li>
            <li class="ms-3"><a class="text-white" href="https://whatsapp.com"><img
                        src="../ico/free-icon-whatsapp-3670051.png" alt=""></a></li>
        </ul>
    </footer>
</div>
</body>

</html>
