@extends('layouts.main')

@section('title')
    Новости
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-1">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> >
                        <span
                                class="text-muted">Новости</span></h6>
                </nav>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col text-center">
                <h4 class="font-weight-bold">Все новости</h4>
            </div>
        </div>
        <div class="row pb-2">
            <div class="col">
                <a href="/news/create" class="text-decoration-none">
                    <button type="button" class="btn btn-primary rounded-0">Добавить новость</button>
                </a>
                <span class="d-block d-sm-inline pl-3">Всего новостей: {{count($news)}} </span>
            </div>
        </div>
        @for($i = 0; $i < count($news); $i++)
            <div class="row mb-2">
                <div class="col">
                    <div class="card px-3 rounded-0 shadow-sm">
                        <div class="row no-gutters">
                            <div class="col-md-3 py-2 my-auto">
                                @if(isset($news[$i]->new_images[0]))
                                    <img src="{{asset($news[$i]->new_images[0]->path)}}" alt=""
                                         class="d-block admin-new-img rounded-0">
                                @else
                                    <img src="{{asset('/img/blank.jpg')}}" alt=""
                                         class="d-block admin-new-img rounded-0">
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-3">
                                    <a href="/news/{{$news[$i]->id}}" class="text-decoration-none">
                                        <h5 class="card-title">{{$news[$i]->new_header}}</h5>
                                        @if(isset($news[$i]->new_lead))
                                            <div class="card-text">
                                                <h6 class="text-dark">
                                                    {{$news[$i]->new_lead}}
                                                </h6>
                                                <h6 class="text-muted mt-2">
                                                    {{date('H:i, d.m.Y', strtotime($news[$i]->created_at))}}
                                                </h6>
                                            </div>
                                        @else
                                            <div class="card-text">
                                                <h6 class="text-muted mt-2">
                                                    {{date('H:i, d.m.Y', strtotime($news[$i]->created_at))}}
                                                </h6>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="col-5 col-md-2 my-auto">
                                <form action="/news/{{$news[$i]->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="admin" value="1">
                                    <button type="submit" class="btn btn-danger w-100 rounded-0">Удалить</button>
                                    <a href="/news/{{$news[$i]->id}}/edit">
                                        <button type="button" class="btn my-2 btn-warning w-100 rounded-0">
                                            Изменить
                                        </button>
                                    </a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </main>
@endsection