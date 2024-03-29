<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/style.css">
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
                            <li><a class="dropdown-item" href="{{ route('kitchen') }}">Для кухни</a></li>
                            <li><a class="dropdown-item" href="{{ route('bathroom') }}">Для ванной</a></li>
                            <li><a class="dropdown-item" href="{{ route('bedroom') }}">Спальная мебель</a></li>
                            <li><a class="dropdown-item" href="{{ route('wardrobe') }}">Мебель в гардеробную</a></li>
                            <li><a class="dropdown-item" href="{{ route('living') }}">Мебель в гостинную</a></li>
                            <li><a class="dropdown-item" href="{{ route('children') }}">Детская мебель</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('order') }}" class="nav-link px-2 text-white">Мебель на заказ</a></li>
                    <li><a href="{{ route('news') }}" class="nav-link px-2 text-white">Новости</a></li>
                    <li><a href="{{ route('contacts') }}" class="nav-link px-2 text-white">Контакты</a></li>
                </ul>

                <div class="text-end">
                    @guest
                        <button type="button" class="btn btn-outline-light me-2" id='signup'>Регистрация</button>
                        <button type="button" class="btn btn-warning" id='login'>Вход</button>
                    @endguest
                    @auth
                        <button type="button" class="btn btn-outline-light me-2">Корзина</button>
                        <a href="{{ route('logout') }}"><button type="button" class="btn btn-warning">Выйти</button></a>
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
                <span class="mb-3 mb-md-0 text-white">© 2023 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-white" href="https://vk.com"><img src="ico/free-icon-vk-3670055.png"
                            alt=""></a></li>
                <li class="ms-3"><a class="text-white" href="https://telegram.com"><img
                            src="ico\free-icon-telegram-2111646.png" alt=""></a></li>
                <li class="ms-3"><a class="text-white" href="https://instagram.com"><img
                            src="ico\free-icon-instagram-3955024.png" alt=""></a></li>
                <li class="ms-3"><a class="text-white" href="https://whatsapp.com"><img
                            src="ico\free-icon-whatsapp-3670051.png" alt=""></a></li>
            </ul>
        </footer>
    </div>
    <div class="modal" id='formlogin' tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Вход</h3>
                    <button type="button" class="close" name='closelogin' data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form action="/login" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Введите email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Пароль" required>
                        </div>
                        <button style="display: none" id="loginnone" type="submit"></button>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="doLogin">Войти</button>

                    <button type="button" class="btn btn-secondary" name='closelogin'
                        data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id='formsignup' tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Регистрация</h3>
                    <button type="button" class="close" name='closesignup' data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form action="{{ route('signup') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="ФИО"
                                autocomplete="family-name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Введите email" name="email"
                                autocomplete="email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword"
                                placeholder="Пароль" name="password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Повторите пароль" required>
                        </div>
                        <button style="display: none" id="signupnone" type="submit"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="doSignup">Зарегестрироваться</button>

                <button type="button" class="btn btn-secondary" name='closesignup'
                    data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
    <script src="js/forms.js"></script>
</body>

</html>
