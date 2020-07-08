@extends('layouts.main')

@section('title')
    Магистратура
@endsection

@section('content')
    <main class="container pl-md-0 mb-3">
        <div class="row">
            <div class="col-md-3 sidebar d-none d-md-block">
                <a href="/student/bachelor" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Бакалавриат</div>
                </a>
                <div class="btn btn-light w-100 rounded-0 mb-2 active shadow-sm">Магистратура</div>
                <a href="/student/aspirant" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Аспирантура</div>
                </a>
                <a href="/student/contacts" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Контакты</div>
                </a>
            </div>
            <div class="col bg-white p-4">
                <div class="row pb-1">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/student">Студенту</a> >
                                <span
                                        class="text-muted">Магистратура</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-1">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Магистратура</h4>
                    </div>
                </div>
                @if(empty($profiles[0]))
                    <div class="row pt-2 mt-3 pb-1">
                        <div class="col text-center">
                            <h5>Раздел пока что пуст, но скоро он будет дополнен!</h5>
                        </div>
                    </div>
                @else
                    <div class="row pt-2 pb-1">
                        <div class="col">
                            <h5>Курсы, читаемые сотрудниками кафедры физики полупроводников:</h5>
                        </div>
                    </div>
                    @for($i = 0; $i < count($profiles); $i++)
                        <div class="col row">
                            <div class="col-12 p-1">
                                <div class="card border-news-dark rounded-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $profiles[$i]->name }}</h5>
                                        @if(!empty($profiles[$i]->subjects))
                                            <ul class="list-group list-group-flush">
                                                @foreach($profiles[$i]->subjects as $subject)
                                                    <li class="list-group-item pr-0">
                                                        <div class="col">
                                                            <h5>{{$subject->name}}</h5>
                                                            @if(!empty($subject->teacher))
                                                                <h6>
                                                                    @if($subject->teacher->user->deleted === 0)
                                                                        <a href="/employees/{{$subject->teacher->id}}">
                                                                            @endif
                                                                            {{$subject->teacher->surname}} {{$subject->teacher->name}}
                                                                            @if(!empty($subject->teacher->patronymic))
                                                                                {{$subject->teacher->patronymic}}
                                                                            @endif
                                                                            @if($subject->teacher->user->deleted === 0)
                                                                        </a>
                                                                    @endif<br>
                                                                    @if(!empty($subject->teacher->degree))
                                                                        <span class="text-muted">
                                                                 ({{$subject->teacher->degree}})
                                                                </span>
                                                                    @endif
                                                                </h6>
                                                            @endif
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
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