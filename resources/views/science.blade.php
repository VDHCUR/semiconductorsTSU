@extends('layouts.main')

@section('title')
    Научная работа
@endsection

@section('content')
<main class="container p-4 px-md-5 mb-3" id="main">
    <div class="row pt-2 pb-3">
        <div class="col text-center">
            <h4 class="font-weight-bold">Научная работа</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pl-md-0 pr-md-1">
            <a href="/science/projects">
                <div class="card h-100 rounded-0">
                    <img src="{{asset('img/science/projects.jpg')}}" class="card-img-top about-img science-main-img rounded-0" alt="Проекты">
                    <div class="card-img-overlay">
                        <h4 class="card-title text-light mx-auto">Проекты</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 row pr-0 pl-0 pl-md-1 mx-auto">
            <div class="col-12 px-md-0 pb-2 pt-2 pt-md-0">
                <a href="/science/publications">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/science/publications.jpg')}}" class="card-img-top about-img rounded-0" alt="Публикации">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light mx-auto">Публикации</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 px-md-0">
                <a href="/science/coop">
                    <div class="card h-100 rounded-0">
                        <img src="{{asset('img/science/coop.jpg')}}" class="card-img-top about-img rounded-0" alt="Сотрудничество">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-light mx-auto">Сотрудничество</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
