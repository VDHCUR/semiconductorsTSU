@extends('layouts.main')

@section('title')
    Архив проектов
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
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> >
                                <a href="/science">Научная работа</a> > <a href="/science/projects">Проекты</a> >
                                <span class="text-muted">Архив проектов</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-1">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Архив проектов</h4>
                    </div>
                </div>
                @if(empty($projects[0]))
                    <div class="col">
                        <h5 class="text-center">Архив пуст</h5>
                    </div>
                @else
                    @for($i = 0; $i < count($projects); $i++)
                        <div class="col row">
                            <div class="col-12 p-1">
                                <div class="card border-news-dark rounded-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $projects[$i]->codename }}</h5>
                                        <h5 class="card-text">{{$projects[$i] -> name}}</h5>
                                        @if(!empty($projects[$i]->director))
                                            <h5 class="card-text">
                                                Руководитель:
                                                @if($projects[$i]->director->user->deleted === 0)
                                                    <a href="/employees/{{$projects[$i]->director->id}}">
                                                        @endif
                                                        {{$projects[$i]->director->surname}} {{$projects[$i]->director->name}}
                                                        @if(!empty($projects[$i]->director->patronymic))
                                                            {{$projects[$i]->director->patronymic}}
                                                        @endif
                                                        @if($projects[$i]->director->user->deleted === 0)
                                                    </a>
                                                @endif
                                            </h5>
                                        @endif
                                        <h5 class="card-text">Срок сдачи: {{$projects[$i]->deadline}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </main>
@endsection
