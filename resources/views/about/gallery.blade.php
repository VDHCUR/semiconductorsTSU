@extends('layouts.main')

@section('title')
    Фотогалерея
@endsection

@section('content')
    <main class="container pl-md-0 mb-3">
        <div class="row pb-3">
            <div class="col-md-3 sidebar d-none d-md-block">
                <a href="/profiles" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Направления</div>
                </a>
                <a href="/history" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">История</div>
                </a>
                <a href="/employees" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Cотрудники</div>
                </a>
                <div class="btn btn-light w-100 rounded-0 mb-2 active shadow-sm">Фотогалерея</div>
            </div>
            <div class="col bg-white p-4">
                <div class="row pb-1">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/about">О кафедре</a> >
                                <span class="text-muted">Фотогалерея</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-3">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Фотогалерея</h4>
                    </div>
                </div>
                <div class="row">
                    @if(empty($images[0]))
                        <div class="col text-center mt-3">
                        Фотогалерея пуста
                        </div>
                    @else
                    @for($i = 0; $i < count($images); $i++)
                        <div class="col-6 col-lg-4 mb-3 px-2" style="height: 13rem">
                                    <img src="{{asset($images[$i]->path)}}" class="w-100 h-100 slider-img" alt="gallery">
                        </div>
                    @endfor
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection