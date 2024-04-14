@extends('maintemplate')

@section('content')
    <div class="content">
        <div class="prewie">
            <img src="../ico\43564-mebel-dlya-vannoy.jpg" alt="">
            <div class="color"></div>
            <div class="text">
                <h1>Услуги</h1>
            </div>
        </div>
        <div class="list">
            <div class="content-center">
                @yield('content-center')
            </div>
            <div class="content-right">
                <div class="content-right-center">
                    <div class="button"> Под заказ от 5 рабочих дней </div>
                    <p></p>
                    <p><b>Готовы заказать? Нужна консультация специалиста?</b></p>
                    <p>Заполните форму и наши специалисты свяжутся с Вами для уточнения всех деталей.</p>
                    <a href="{{route('order')}}" class="btn btn-warning">Отпавить заявку-></a>
                </div>
            </div>
        </div>
    </div>
@endsection
