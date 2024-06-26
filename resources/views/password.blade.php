@extends('maintemplate')
@section('content')
    <div class="container mt-5 form-signin w-100 m-auto align-items-center py-4">
        <h1>Изменить пароль</h1>
        <form action="" method="post" class="col-lg-6 mt-5">
            @csrf
            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Старый пароль">
                <label for="oldPassword" style="color: black">Старый пароль</label>
            </div>
            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="newPassword" name="password" placeholder="Пароль">
                <label for="newPassword" style="color: black">Пароль</label>
            </div>
            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="newPasswordConfirm" name="password_confirmation" placeholder="Пароль ещё раз">
                <label for="newPasswordConfirm" style="color: black">Пароль ещё раз</label>
            </div>
            <button class="btn btn-success mt-5">
                <h2 class="p-1">Изменить</h2>
            </button>
        </form>
    </div>
@endsection
