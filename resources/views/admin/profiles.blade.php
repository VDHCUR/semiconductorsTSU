@extends('layouts.main')

@section('title')
    Направления и предметы
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-1">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> >
                        <span class="text-muted">Направления и предметы</span></h6>
                </nav>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col text-center">
                <h4 class="font-weight-bold">Все направления и предметы</h4>
            </div>
        </div>
        <div class="row pb-2">
            <div class="col">
                <a href="/profiles/create" class="text-decoration-none">
                    <button type="button" class="btn btn-primary rounded-0">Добавить направление</button>
                </a>
                <span class="d-block d-sm-inline pl-3">Всего направлений: {{count($profiles)}} </span>
            </div>
        </div>
        @for($i = 0; $i < count($profiles); $i++)
            <div class="row">
                <div class="col py-1 pr-2 pl-0">
                    <div class="card h-100 border-news-dark rounded-0">
                        <div class="card-body my-auto">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 class="card-title font-weight-bold">{{ $profiles[$i]->name }}
                                        @if($profiles[$i]->stage === 0)
                                            <span class="font-weight-normal"> (Бакалавриат)</span>
                                        @elseif($profiles[$i]->stage === 1)
                                            <span class="font-weight-normal"> (Магистратура)</span>
                                        @endif
                                    </h5>
                                    <a href="/profiles/{{$profiles[$i]->id}}/subjects/create" class=>
                                        <h6>+ Добавить предмет</h6>
                                    </a>
                                </div>
                                <div class="col-lg-4 text-lg-right mb-3 mb-lg-0">
                                    <form action="/profiles/{{$profiles[$i]->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group" role="group">
                                            <a href="/profiles/{{$profiles[$i]->id}}/edit">
                                                <button type="button" class="btn ml-1 btn-warning py-1 rounded-0">
                                                    Изменить
                                                </button>
                                            </a>
                                            <button type="submit" class="btn btn-danger ml-1 w-50 rounded-0 py-1">
                                                Удалить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($profiles[$i]->subjects as $subject)
                                    <li class="list-group-item">
                                        <div class="col">
                                            <h5>
                                                {{$subject->name}} <a class="d-inline-block"
                                                                      href="/profiles/{{$profiles[$i]->id}}/subjects/{{$subject->id}}/edit">
                                                    <h6 class="d-inline">Изменить предмет</h6>
                                                </a>
                                            </h5>
                                            @if(!empty($subject->teacher))
                                                @if($subject->teacher->user->deleted === 0)
                                                    <a href="/employees/{{$subject->teacher->id}}">
                                                        @endif
                                                        <h6>
                                                            {{$subject->teacher->surname}} {{$subject->teacher->name}}
                                                            @if(!empty($subject->teacher->patronymic))
                                                                {{$subject->teacher->patronymic}}
                                                            @endif
                                                        </h6>
                                                        @if($subject->teacher->user->deleted === 0)
                                                    </a>
                                                @endif
                                            @endif
                                            <form method="post" action="/subjects/{{$subject->id}}"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-0 py-0">Удалить
                                                    предмет
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </main>
@endsection