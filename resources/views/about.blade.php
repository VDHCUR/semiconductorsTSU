@extends('layouts.main')

@section('title')
    О кафедре
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pt-2 pb-3">
            <div class="col text-center ">
                <h4 class="font-weight-bold">О кафедре</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 p-1">
                <a href="/profiles">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/about/light.jpg')}}" class="card-img-top about-img rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light mx-auto">Направления подготовки</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-5 p-1">
                <a href="/history">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/about/space.jpg')}}" class="card-img-top about-img rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light">История</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 p-1">
                <a href="/gallery">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/about/tsu.jpg')}}" class="card-img-top about-img rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title mx-auto text-light">Фотогалерея</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-7 p-1">
                <a href="/employees">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/about/empl.jpg')}}" class="card-img-top about-img rounded-0">
                        <div class="card-img-overlay">
                            <h4 class="card-title mx-auto text-light">Сотрудники</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
@endsection
