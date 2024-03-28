@extends('maintemplate')
@section('content')
    <div class="container form-signin w-100 m-auto align-items-center py-4">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <form method="post" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <a href="/"
                               class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none logo">
                                <p class="yellow">L</p>ike<p class="yellow">M</p>ebel
                            </a>
                        </div>
                    </div>
                    <h1 class="h3 mb-3 fw-normal text-center" style="color: white">Регистрация</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" id="floatingName" placeholder="Имя" required>
                        <label for="floatingName" style="color: black">Имя</label>
                    </div>

                    <div class="form-floating  mt-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput" style="color: black">Email</label>
                    </div>

                    <div class="form-floating mt-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword" style="color: black">Пароль</label>
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mt-3">
                        <input type="password" class="form-control" name="password_confirmation" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword" style="color: black">Повторите пароль</label>
                    </div>

                    <div class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox" name="check" value="remember-me" id="flexCheckDefault">
                        <label class="form-check-label"  for="flexCheckDefault">
                            Оставаться в системе
                        </label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрироваться</button>
                    <div class="container">
                        <a href="{{route('login')}}" class="link mt-5">Вход</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
