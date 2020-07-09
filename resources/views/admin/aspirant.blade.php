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
                        <span class="text-muted">Аспирантура</span></h6>
                </nav>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col text-center">
                <h4 class="font-weight-bold">Аспирантура</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(empty($info))
                    <div class="text-center mt-3">
                        <h5 class="text-center">Пока что нет никакой информации для аспирантов.</h5>
                        <a href="/aspirant/create" class="text-decoration-none">
                            <button type="button" class="btn btn-primary rounded-0">Добавить информацию</button>
                        </a>
                    </div>
                @else
                    <div class="text-center my-1">
                        <a href="/aspirant/edit" class="text-decoration-none">
                            <button type="button" class="btn btn-primary rounded-0 mt-1 mb-3">Изменить информацию
                            </button>
                        </a>
                    </div>
                    {!! $info -> info !!}
                    @if(!empty($info->docs[0]))
                        <h5 class="font-weight-bold py-3">Прикреплённые документы</h5>
                        @foreach($info->docs as $doc)
                            <a href="{{asset($doc->path)}}"><h5 class="pb-2">{{$doc->name}}</h5></a>
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </main>
@endsection