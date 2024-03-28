@extends('maintemplate')
@section('content')
    <div class="container m-5">
        <h1>Оставить заявку</h1>
        <div class="container form-signin w-100 m-auto align-items-center py-4">
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <form method="post" action="" enctype="multipart/form-data">
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
                        <h1 class="h3 mb-3 fw-normal text-center" style="color: white">Оставьте свои данные и наш консультант свяжется с вами в ближайшее время</h1>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="name"  @if(isset(auth()->user()->name)) value="{{auth()->user()->name}}" @else value="{{old('name')}}" @endif id="floatingInput"
                                   placeholder="name@example.com">
                            <label for="floatingInput" style="color: black">Имя</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" class="form-control" name="phone" @if(isset(auth()->user()->phone)) value="{{auth()->user()->phone}}" @else value="{{old('phone')}}" @endif id="floatingPassword"
                                   placeholder="Password">
                            <label for="floatingPassword" style="color: black">Телефон</label>
                        </div>
                        <div class="form-floating mt-2">
                            <p>Вы можете прикрепить фотографию изделия ии чертёшь для наглядности</p>
                            <input class="form-control form-control-lg" id="formFileLg" type="file" value="{{old('file')}}" name="file">
                        </div>
                        <div class="form-floating mt-2">
                            <p>Коментарий к заявке</p>
                            <textarea class="form-control form-control-lg" id="formFileLg" type="" data-value="{{old('message')}}" name="message"></textarea>
                        </div>
                        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Получить консультацию</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
