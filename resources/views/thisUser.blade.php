@extends("maintemplate")
@section('content')
    <div class="container mt-5">
        <div class="d-flex">
            <img class="avatar-2" src="../storage/{{$user->avatar}}" alt="">
            <div>
                <h1 class="m-4">{{$user->name}}</h1>
                <h2 class="ms-4">{{$user->email}}</h2>
            </div>
        </div>
        <form method="post" action="" class="mt-5">
            @csrf
            <div class="form-floating w-50">
                <input type="text" class="form-control" name="phone" @if($user->phone!=null) value="{{$user->phone}}" @else value="{{old('phone')}}" @endif id="floatingInput"
                       placeholder="name@example.com">
                <label for="floatingInput" style="color: black">Номер телефона</label>
            </div>
            <button class="btn btn-primary w-25 py-2" type="submit">Изменить номер</button>
        </form>
        <div class="row m-5">
            <div class="col-lg-4">
                <a href="{{route('avatar')}}" type="button" class="btn btn-success"><h2 class="p-1">Изменить аватар</h2></a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('password')}}" type="button" class="btn btn-warning"><h2 class="p-1">Изменить пароль</h2></a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('delete')}}" type="button" class="btn btn-danger"><h2 class="p-1">Удалить аккаунт</h2></a>
            </div>
        </div>
    </div>
@endsection
