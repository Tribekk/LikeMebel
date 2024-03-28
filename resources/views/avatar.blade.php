@extends('maintemplate')
@section('content')
    <div class="container m-5">
        <h1>Загрузите фото</h1>
        <form action="" method="post" class="col-lg-6 mt-5" enctype="multipart/form-data">
            @csrf
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">
            <button class="btn btn-success mt-5">
                <h2 class="p-1">Сохранить</h2>
            </button>
        </form>
    </div>
@endsection
