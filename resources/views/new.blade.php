@extends('maintemplate')
@section('content')
    @foreach($new as $ne)
        <div class="container m-5">
            <h1>{{$ne->title}}</h1>
            <img style="width: 800px" src="/storage/{{$ne->header_photo}}" alt="">
            {!!$ne->description!!}
            <div class="row">
            @foreach($photosForNew as $photo)
                <div class="col-lg-4">
                    <img style="width: 400px" src="/storage/{{$photo->photo}}" alt="">
                </div>
            @endforeach
            </div>
        </div>
    @endforeach
@endsection

