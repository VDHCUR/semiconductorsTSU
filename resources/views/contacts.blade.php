@extends('layouts.main')

@section('title')
    Контакты
@endsection

@section('content')
    <main class="container pl-md-0 mb-3">
        <div class="row">
            <div class="col-md-3 sidebar d-none d-md-block">
                <a href="/student/bachelor" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Бакалавриат</div>
                </a>
                <a href="/student/magistr" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Магистратура</div>
                </a>
                <a href="/student/aspirant" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Аспирантура</div>
                </a>
                <div class="btn btn-light w-100 rounded-0 mb-2 active shadow-sm">Контакты</div>
            </div>
            <div class="col bg-white p-4">
                <div class="row pb-1">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/student">Студенту</a> >
                                <span
                                        class="text-muted">Контакты</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-1">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Контакты</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Адрес: 634050 г. Томск, пл. Новособорная, 1, гл. корпус СФТИ, к.126.</p>
                        @if(empty($director->person))
                            <div class="py-3 text-center"> Раздел будет дополнен</div>
                        @else
                            <div class="pb-3">
                                <h5>{{$director->person->surname}} {{$director->person->name}} @if(!empty($director->person->patronymic)) {{$director->person->patronymic}} @endif
                                    <span class="text-lowercase">({{$director->person->position}})</span></h5>
                                <h5>E-mail: {{$director->email}}</h5>
                                <h5>тел./факс: {{$director->person->phone}}</h5>
                            </div>
                            @if(!empty($secretary->person))
                                <div class="pb-3">
                                    <h5>{{$secretary->person->surname}} {{$secretary->person->name}} @if(!empty($secretary->person->patronymic)) {{$secretary->person->patronymic}} @endif
                                        <span class="text-lowercase">({{$secretary->person->position}})</span></h5>
                                    <h5>E-mail: {{$secretary->email}}</h5>
                                    <h5>тел./факс: {{$secretary->person->phone}}</h5>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A4ed99f420d4b459c13dab5f5bcfe9f22850a54c0b88fa07e408f31dc45dd5aff&amp;source=constructor"
                                width="100%" height="409" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection