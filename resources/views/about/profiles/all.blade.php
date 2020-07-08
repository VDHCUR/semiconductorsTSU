@extends('layouts.main')

@section('title')
    Направления
@endsection

@section('content')
    <main class="container pl-md-0 mb-3">
        <div class="row pb-3">
            <div class="col-md-3 sidebar d-none d-md-block">
                <div class="btn btn-light w-100 rounded-0 mb-2 active shadow-sm">Направления</div>
                <a href="/history" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">История</div>
                </a>
                <a href="/employees" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Cотрудники</div>
                </a>
                <a href="/gallery" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Фотогалерея</div>
                </a>
            </div>
            <div class="col bg-white py-4 p-md-4">
                <div class="row pb-1">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/about">О кафедре</a> >
                                <span class="text-muted">Направления</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-1">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Направления подготовки</h4>
                    </div>
                </div>
                @if(empty($profiles[0]))
                    <div class="col text-center">
                        <h5>Раздел пока что пуст, но скоро он будет дополнен!</h5>
                    </div>
                @else
                    <div class="col">
                        <h5>Кафедра физики полупроводников проводит обучение студентов по следующим направлениям:</h5>
                    </div>
                    @for($i = 0; $i < count($profiles); $i++)
                        @if($i % 2 === 0)
                            <div class="col row mx-auto">
                                @endif
                                <div class="col-lg-6 py-1 pr-2 pl-0">
                                    <div class="card h-100 border-news-dark rounded-0 shadow-sm">
                                        <div class="card-body my-auto">
                                            <h5 class="card-title font-weight-bold">{{ $profiles[$i]->name }}</h5>
                                            @if($profiles[$i]->stage === 0)
                                                <p class="card-body p-0 mb-0">Бакалавриат</p>
                                            @elseif($profiles[$i]->stage === 1)
                                                <p class="card-body p-0 mb-0">Магистратура</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($i % 2 === 1)
                            </div>
                        @endif
                    @endfor
                @endif
            </div>
        </div>
    </main>
@endsection