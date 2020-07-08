@extends('layouts.main')

@section('title')
    Главная
@endsection

@section('content')
    <main class="container pb-4 p-0 mb-3" id="main">
        @if(!empty($news[0]))
        <div id="carouselExampleControls" class="carousel slide d-none d-sm-block mb-2" data-ride="carousel">
            <div class="carousel-inner h-100" style="max-height: 20rem">
                <div class="carousel-item active">
                    <a href="/news/{{$news[0]->id}}">
                        @if(!empty($news[0]->new_images[0]))
                            <img src="{{$news[0]->new_images[0]->path}}" class="d-block main-slider-img mx-auto"
                                 alt="{{$news[0]->new_header}}">
                        @else
                            <img src="{{asset('img/blank.jpg')}}" class="d-block main-slider-img mx-auto"
                                 alt="{{$news[0]->new_header}}">
                        @endif

                            <div class="carousel-box w-100">
                                <div class="d-flex align-items-center text-center carousel-text px-3 py-2 px-lg-4 text-light mx-auto font-weight-bold">
                                    <h5 class="font-weight-bold w-100 m-0">{{$news[0]->new_header}}</h5>
                                </div>
                            </div>
                    </a>
                </div>
                @for($i = 1; $i < count($news); $i++)
                    <div class="carousel-item">
                        <a href="/news/{{$news[$i]->id}}">
                            @if(!empty($news[$i]->new_images[0]))
                                <img src="{{$news[$i]->new_images[0]->path}}" class="d-block main-slider-img mx-auto"
                                     alt="{{$news[$i]->new_header}}">
                            @else
                                <img src="{{asset('img/blank.jpg')}}" class="d-block main-slider-img mx-auto"
                                     alt="{{$news[$i]->new_header}}">
                            @endif
                                <div class="carousel-box w-100">
                                    <div class="d-flex align-items-center text-center carousel-text px-3 py-2 px-lg-5 py-lg-3  text-light mx-auto font-weight-bold">
                                        <h5 class="font-weight-bold w-100 m-0">{{$news[$i]->new_header}}</h5>
                                    </div>
                                </div>
                        </a>
                    </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon-dark" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon-dark" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
            @else
            <div class="row mt-3">
                <div class="col-10 p-2 mx-auto">
                    <a href="/news">
                        <div class="card h-100 rounded-0">
                            <img src="{{asset('img/news.jpg')}}" class="index-block rounded-0">
                            <div class="card-img-overlay">
                                <h4 class="card-title text-light">Новости</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
        <div class="row d-block d-sm-none mt-3">
            <div class="col-10 p-2 mx-auto">
                <a href="/news">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/news.jpg')}}" class="index-block rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">Новости</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 p-2 mx-auto">
                <a href="/student">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/student/bachelor.jpg')}}" class="index-block rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">Студенту</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 p-2 mx-auto">
                <a href="/employees">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/about/empl.jpg')}}" class="index-block rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">Сотрудники</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 p-2 mx-auto">
                <a href="/student/contacts">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/student/contacts.jpg')}}" class="index-block rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">Контакты</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 p-2 mx-auto">
                <a href="/science/coop">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/science/coop.jpg')}}" class="index-block rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">Сотрудничество</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
@endsection