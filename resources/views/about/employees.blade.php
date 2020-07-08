@extends('layouts.main')

@section('title')
    Сотрудники
@endsection

@section('content')
    <main class="container pl-md-0 mb-3">
        <div class="row pb-3">
            <div class="col-md-3 sidebar d-none d-md-block">
                <a href="/profiles" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Направления</div>
                </a>
                <a href="/history" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">История</div>
                </a>
                <div class="btn btn-light w-100 rounded-0 mb-2 active shadow-sm">Cотрудники</div>
                </a>
                <a href="/gallery" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Фотогалерея</div>
                </a>
            </div>
            <div class="col bg-white p-4">
                <div class="row pb-1">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/about">О кафедре</a> >
                                <span
                                        class="text-muted">Сотрудники</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-4">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Сотрудники</h4>
                    </div>
                </div>
                @for($i = 0; $i < count($employees); $i++)
                    @if($i % 2 === 0)
                        <div class="row">
                            @endif
                            <div class="col-lg-6 px-1 mb-2">
                                <div class="card h-100 px-3 rounded-0 shadow-sm">
                                    <div class="row no-gutters my-auto">
                                        <div class="col-3 py-2 my-auto">
                                            @if(isset($employees[$i]->person->avatar[0]))
                                                <img src="{{asset($employees[$i]->person->avatar[0]->path)}}" alt=""
                                                     class="d-block employee-new-img rounded-0">
                                            @else
                                                <img src="{{asset('/img/blank_profile.png')}}" alt=""
                                                     class="employee-new-img rounded-0">
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <div class="card-body p-3">
                                                <a href="/employees/{{$employees[$i]->id}}"
                                                   class="text-decoration-none">
                                                    <h5 class="card-title font-weight-normal">{{$employees[$i]->person->surname}} {{$employees[$i]->person->name}}
                                                        @if(!empty($employees[$i]->person->patronymic))
                                                            {{$employees[$i]->person->patronymic}}
                                                        @endif
                                                    </h5>
                                                    <div class="card-text ">
                                                        @if(isset($employees[$i]->person->degree))
                                                            <h6 class="text-dark">
                                                                {{$employees[$i]->person->degree}}
                                                            </h6>
                                                        @endif
                                                        <h6 class="text-muted">{{$employees[$i]->person->position}}</h6>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($i % 2 === 1)
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </main>
@endsection
