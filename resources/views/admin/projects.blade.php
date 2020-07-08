@extends('layouts.main')

@section('title')
    Проекты
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-1">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> >
                        <span class="text-muted">Проекты</span></h6>
                </nav>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col text-center">
                <h4 class="font-weight-bold">Все проекты</h4>
            </div>
        </div>
        <div class="row pb-2">
            <div class="col">
                <a href="/projects/create" class="text-decoration-none">
                    <button type="button" class="btn btn-primary rounded-0">Добавить проект</button>
                </a>
                <span class="d-block d-sm-inline pl-3">Всего проектов: {{count($projects)}} </span>
            </div>
        </div>
        @for($i = 0; $i < count($projects); $i++)
            <div class="row">
                <div class="col-12 p-1">
                    <div class="card border-news-dark rounded-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9 col-lg-10">
                                    <h5 class="card-title font-weight-bold">{{ $projects[$i]->codename }} @if($projects[$i]->archived)
                                            <span class="text-info">(В архиве)</span> @endif</h5>
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
                                <div class="col-md-3 col-lg-2 my-md-auto mt-2 mt-md-0">
                                    <form action="/projects/{{$projects[$i]->id}}" method="post"
                                          class="d-inline-block d-md-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100 rounded-0">Удалить</button>
                                    </form>
                                    <a href="/projects/{{$projects[$i]->id}}/edit"
                                       class="d-inline-block d-md-block text-decoration-none">
                                        <button type="button"
                                                class="btn d-inline-block d-md-block mt-md-2 btn-warning w-100 rounded-0">
                                            Изменить
                                        </button>
                                    </a>
                                    <form action="/projects/{{$projects[$i]->id}}/archive" method="post"
                                          class="d-inline-block d-md-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="btn btn-info mt-md-2 w-100 rounded-0">@if($projects[$i]->archived)
                                                Разархивировать @else В архив @endif</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </main>
@endsection