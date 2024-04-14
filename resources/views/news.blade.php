@extends('maintemplate')
@section('content')
    <div class="container">
        <h1>Новости</h1>
        @foreach($news as $new)
        <div class="row mt-5">
            <div class="col-lg-4"></div>
            <div class="col-lg-5">
                <div class="card">
                    <img src="../storage/{{$new->header_photo}}" alt="" class="card-img-top" style="width: 30vw">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/new/{{$new->id}}">{{$new->title}}</a></h5>
                        {{Str::limit(strip_tags($new->description), 200)}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
