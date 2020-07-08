@extends('layouts.main')

@section('title')
    Сотрудничество
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-1">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> >
                        <span class="text-muted">Сотрудничество</span></h6>
                </nav>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col text-center">
                <h4 class="font-weight-bold">Все сотрудничающие организации</h4>
            </div>
        </div>
        <div class="row pb-2">
            <div class="col">
                <a href="/coop/create" class="text-decoration-none">
                    <button type="button" class="btn btn-primary rounded-0">Добавить организацию</button>
                </a>
                <span class="d-block d-sm-inline pl-3">Всего организаций: {{count($coops)}} </span>
            </div>
        </div>
        @for($i = 0; $i < count($coops); $i++)
            <div class="row">
                <div class="col-12 p-1">
                    <div class="card border-news-dark rounded-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9 col-lg-10">
                                    @if(!empty($coops[$i]->link))
                                    <a href="{{$coops[$i]->link}}">
                                        @endif
                                        <h5 class="card-title font-weight-bold">{{ $coops[$i]->name }}</h5>
                                        @if(!empty($coops[$i]->link))
                                    </a>
                                    @endif
                                    <h5 class="card-text">{{$coops[$i] -> place}}</h5>
                                    @if($coops[$i]->global)
                                        <h5 class="card-text text-muted">Международное</h5>
                                    @endif
                                </div>
                                <div class="col-md-3 col-lg-2 my-md-auto mt-2 mt-md-0">
                                    <form action="/coop/{{$coops[$i]->id}}" method="post"
                                          class="d-inline-block d-md-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100 rounded-0">Удалить</button>
                                    </form>
                                    <a href="/coop/{{$coops[$i]->id}}/edit"
                                       class="d-inline-block d-md-block text-decoration-none">
                                        <button type="button"
                                                class="btn d-inline-block d-md-block mt-md-2 btn-warning w-100 rounded-0">
                                            Изменить
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </main>
@endsection
