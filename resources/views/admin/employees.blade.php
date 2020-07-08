@extends('layouts.main')

@section('title')
    Сотрудники
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-1">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> >
                        <span
                                class="text-muted">Сотрудники</span></h6>
                </nav>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col text-center">
                <h4 class="font-weight-bold">Все сотрудники</h4>
            </div>
        </div>
        <div class="row pb-2">
            <div class="col">
                <a href="/register" class="text-decoration-none">
                    <button type="button" class="btn btn-primary rounded-0">Зарегистрировать сотрудника</button>
                </a>
                <span class="d-block d-sm-inline pl-3">Всего пользователей: {{count($employees)}} </span>
            </div>
        </div>
        @for($i = 0; $i < count($employees); $i++)
            <div class="row mb-2">
                <div class="col">
                    <div class="card px-3 rounded-0 shadow-sm">
                        <div class="row no-gutters">
                            <div class="col-3 py-2 my-auto">
                                @if(isset($employees[$i]->person->avatar[0]))
                                    <img src="{{asset($employees[$i]->person->avatar[0]->path)}}" alt=""
                                         class="d-block admin-new-img rounded-0">
                                @else
                                    <img src="{{asset('/img/blank_profile.png')}}" alt=""
                                         class="admin-new-img rounded-0">
                                @endif
                            </div>
                            <div class="col-7">
                                <div class="card-body p-3">
                                    <a href="/employees/{{$employees[$i]->id}}" class="text-decoration-none">
                                        <h5 class="card-title">{{$employees[$i]->person->surname}} {{$employees[$i]->person->name}}
                                            @if(!empty($employees[$i]->person->patronymic))
                                                {{$employees[$i]->person->patronymic}}
                                            @endif
                                        </h5>
                                        <div class="card-text">
                                            <h6 class="text-dark">{{$employees[$i]->person->position}}</h6>
                                        @if(isset($employees[$i]->person->phone))
                                                <h6 class="text-dark">
                                                    {{$employees[$i]->person->phone}}
                                                </h6>
                                                <h6 class="text-muted mt-2">
                                                    {{date('H:i, d.m.Y', strtotime($employees[$i]->created_at))}}
                                                </h6>
                                        @else
                                                <h6 class="text-muted mt-2">
                                                    {{date('H:i, d.m.Y', strtotime($employees[$i]->created_at))}}
                                                </h6>
                                        @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <form action="/employees/{{$employees[$i]->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="admin" value="1">
                                    <button type="submit" class="btn btn-danger w-100 rounded-0">Удалить</button>
                                </form>
                                <a href="/employees/{{$employees[$i]->id}}/edit">
                                    <button type="button" class="btn my-2 btn-warning w-100 rounded-0">
                                        Изменить
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </main>
@endsection
