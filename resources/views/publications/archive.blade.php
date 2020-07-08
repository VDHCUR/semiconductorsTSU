@extends('layouts.main')

@section('title')
    Архив публикаций
@endsection

@section('content')
    <main class="container pl-md-0 mb-3">
        <div class="row">
            <div class="col-md-3 sidebar d-none d-md-block">
                <a href="/science/projects" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Проекты</div>
                </a>
                <a href="/science/publications" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Публикации</div>
                </a>
                <a href="/science/coop" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Сотрудничество</div>
                </a>
            </div>
            <div class="col bg-white p-4">
                <div class="row pb-1">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/science">Научная работа</a>
                                > <a href="/science/publications">Публикации</a> >
                                <span class="text-muted">Архив публикаций</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-3">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Архив публикаций</h4>
                    </div>
                </div>
                @if(empty($publications[0]))
                    <div class="col">
                        <h5 class="text-center">Архив пуст</h5>
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
            </div>
        </div>
    </main>
@endsection

