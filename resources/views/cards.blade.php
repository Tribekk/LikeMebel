<div class="row">
@foreach($services as $service)
        <div class="col-lg-4">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">{{$service['title']}}</div>
                <div class="card-body">
                    <img src="../storage/{{$service['photo']}}" alt="">
                </div>
                <div class="card-footer bg-transparent border-success">ОТ {{$service['price']}} РУБ.</div>
                <div class="btn btn-warning"><a href="/service/{{$service['id']}}">Подробнее-></a></div>
            </div>
        </div>
@endforeach
</div>
