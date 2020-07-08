@extends('layouts.main')

@section('title')
    Сотрудничество
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
                <div class="btn btn-light w-100 rounded-0 active mb-2 shadow-sm">Сотрудничество</div>
            </div>
            <div class="col bg-white p-4">
                <div class="row pb-1">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/science">Научная работа</a>
                                >
                                <span class="text-muted">Сотрудничество</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-3">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Сотрудничество</h4>
                    </div>
                </div>
                @if(empty($coops[0]) && empty($global[0]))
                    <div class="col">
                        <h5 class="text-center">Список организаций, сотрудничающих с кафедрой, пока что пуст. Раздел будет дополнен в ближайшее время!</h5>
                    </div>
                @else
                    @for($i = 0; $i < count($coops); $i++)
                        <div class="row mb-4">
                            <div class="col mb-2">
                                @if(!empty($coops[$i]->link))
                                    <a href="{{$coops[$i]->link}}">
                                        @endif
                                        <h5 class="card-title font-weight-bold">{{ $coops[$i]->name }}</h5>
                                        @if(!empty($coops[$i]->link))
                                    </a>
                                @endif
                                <h5 class="card-text">{{$coops[$i] -> place}}</h5>
                            </div>
                        </div>
                    @endfor
                @endif
                @if(!empty($globals[0]))
                    <div class="row pt-2 py-3">
                        <div class="col text-center">
                            <h4 class="font-weight-bold" style="font-size: 1.12rem">Международное сотрудничество</h4>
                        </div>
                    </div>
                    @for($i = 0; $i < count($globals); $i++)
                        <div class="row mb-4">
                            <div class="col mb-2">
                                @if(!empty($globals[$i]->link))
                                    <a href="{{$globals[$i]->link}}">
                                        @endif
                                        <h5 class="card-title font-weight-bold">{{ $globals[$i]->name }}</h5>
                                        @if(!empty($globals[$i]->link))
                                    </a>
                                @endif
                                <h5 class="card-text">{{$globals[$i] -> place}}</h5>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </main>
@endsection
