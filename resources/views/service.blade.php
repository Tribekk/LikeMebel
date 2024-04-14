@extends('templateorder')
@section('content-center')
    @foreach($service as $product)

        <h1>{{$product['title']}}</h1>
        <p>{{$product['description']}}
        </p>
        <img src="/storage/{{$product['photo']}}" alt="">
    @endforeach
@endsection
