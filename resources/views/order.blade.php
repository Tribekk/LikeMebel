@extends('maintemplate')

@section('li')
    <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Главная</a></li>
    <li><a href="{{ route('services') }}" class="nav-link px-2 text-white">Услуги</a></li>
    <li><a href="{{ route('order') }}" class="nav-link px-2 text-secondary">Мебель на заказ</a></li>
    <li><a href="{{ route('news') }}" class="nav-link px-2 text-white">Новости</a></li>
    <li><a href="{{ route('contacts') }}" class="nav-link px-2 text-white">Контакты</a></li>
@endsection
