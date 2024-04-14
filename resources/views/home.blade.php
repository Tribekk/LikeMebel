@extends('maintemplate')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            @foreach($photos as $photo)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$photo->id}}"
                        aria-label="Slide {{($photo->id)+1}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="ico\aN7rUaepf8M.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Кухонный гарнитур</h5>
                </div>
            </div>
            @foreach($photos as $photo)
                <div class="carousel-item">
                    <img src="/storage/{{$photo->photo}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$photo->description}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
    <section>
        <div class="container-fulid">
            <div class="row">

                <div class="col-md-3 col-sm-6 section-medium-dark two">
                    <div class="text-box padding-percent-2 text-center">


                        <img style="width: 80px" src="ico\free-icon-production-2640872.png" alt=""
                            class="img-responsive-3 margin-bottom-1">
                        <h5 class="text-white uppercase font-weight-7 margin-bottom-1">Собственное производство</h5>
                        <p class="text-white opacity-5">Производим все то,что продаем в лучших традициях нашей компании.</p>


                    </div>
                </div>

                <div class="col-md-3 col-sm-6 nopadding section-dark">
                    <div class="text-box padding-percent-2 text-center">


                        <img src="ico\free-icon-card-payment-9618751.png" alt=""
                            class="img-responsive-3 margin-bottom-1">
                        <h5 class="text-white uppercase font-weight-7 margin-bottom-1">Без накруток и посредников</h5>
                        <p class="text-white opacity-5">Без накруток и посредников, сторонних фирм и компаний только на
                            прямую.</p>


                    </div>
                </div>

                <div class="col-md-3 col-sm-6 nopadding section-dark two">
                    <div class="text-box padding-percent-2 text-center">


                        <img src="ico\free-icon-business-idea-4724271.png" alt=""
                            class="img-responsive-3 margin-bottom-1">
                        <h5 class="text-white uppercase font-weight-7 margin-bottom-1">Инновационные технологии</h5>
                        <p class="text-white opacity-5">Новые технологии производства на импортном оборудовании известных
                            фирм.</p>


                    </div>
                </div>

                <div class="col-md-3 col-sm-6 nopadding section-fulldark">
                    <div class="text-box padding-percent-2 text-center">


                        <img src="ico\free-icon-delivery-1584805.png" alt=""
                            class="img-responsive-3 margin-bottom-1">
                        <h5 class="text-white uppercase font-weight-7 margin-bottom-1">Сервис доставки и сборки на дому
                        </h5>
                        <p class="text-white opacity-5">От готового изделия с транспортировкой до сборки мебели в вашем
                            доме.</p>


                    </div>
                </div>


            </div>
        </div>
    </section>
    <div class="conteiner">
        <h1>Что мы предлагаем</h1>
        <p>У нас вы можете заказать услуги замерщика, который имеет высокий уровень квалификации и навыки по выполнению этой
            сложной работы.</p>
        @include('cards')
        <a href="{{route('order')}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            ЗАКАЗАТЬ
        </a>
    </div>
@endsection
