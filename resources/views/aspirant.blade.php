@extends('layouts.main')

@section('title')
    Аспирантура
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
                <div class="btn btn-light w-100 rounded-0 mb-2 active shadow-sm">Аспирантура</div>
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
                                        class="text-muted">Аспирантура</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-3">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">Аспирантура</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if(empty($info))
                            <h5 class="text-center">Пока что нет никакой информации для аспирантов. В ближайшее время будут добавлены необходимые данные.</h5>
                            @else
                            {!! $info -> info !!}
                            @if(!empty($info->docs))
                                <h5 class="font-weight-bold py-3">Прикреплённые документы</h5>
                                @foreach($info->docs as $doc)
                                    <a href="{{asset($doc->path)}}"><h5 class="pb-2">{{$doc->name}}</h5></a>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection