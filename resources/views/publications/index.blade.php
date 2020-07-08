@extends('layouts.main')

@section('title')
    Публикации
@endsection

@section('content')
    <main class="container pl-md-0 mb-3">
        <div class="row">
            <div class="col-md-3 sidebar d-none d-md-block">
                <a href="/science/projects" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Проекты</div>
                </a>
                <div class="btn btn-light w-100 rounded-0 mb-2 active shadow-sm">Публикации</div>
                <a href="/science/coop" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Сотрудничество</div>
                </a>
            </div>
            <div class="col bg-white p-4">
                <div class="row pb-1">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/science">Научная работа</a>
                                >
                                <span class="text-muted">Публикации</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-3">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Публикации</h4>
                    </div>
                </div>
                @if(empty($Publications[0]))
                    <div class="col">
                        <h5 class="text-center">Публикации ещё не были добавлены. Раздел будет дополнен в ближайшее время!</h5>
                    </div>
                @else
                    @for($i = 0; $i < count($publications); $i++)
                        <div class="row mb-4">
                            <div class="col mb-2">
                                <h5 class="card-title">{{ $publications[$i]->name }}</h5>
                                <h5 class="card-text">Год публикации: {{$publications[$i] -> year}}</h5>
                            </div>
                        </div>
                    @endfor
                @endif
                <div class="row">
                    <div class="col text-center mt-3">
                        <a href="/science/publications/archive">Архив публикаций</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

