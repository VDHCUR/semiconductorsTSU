@extends('layouts.main')

@section('title')
    {{$new->new_header}}
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/news">Новости</a> > <span
                                class="text-muted">{{$new->new_header}} </span></h6>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="font-weight-bolder">{{$new->new_header}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-muted">
                    {{date('H:i d.m.Y', strtotime($new->created_at))}}
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="font-italic">{{$new->new_lead}}</p>
            </div>
        </div>
        @if(Auth::check())
            @if(Auth::user()->is_admin)
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="deleteModalTitle">Подтверждение</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Действительно хотите удалить эту новость?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Отмена</button>
                                <form method="post" action="/news/{{$new->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger rounded-0">Да, удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col btn-group">
                        <div>
                            <button type="button" class="btn btn-danger rounded-0" data-toggle="modal" data-target="#deleteModal">
                                Удалить
                            </button>
                        </div>
                        <a href="/news/{{$new->id}}/edit">
                            <button type="button" class="btn btn-warning rounded-0 ml-sm-2">
                                Изменить
                            </button>
                        </a>
                    </div>
                </div>
            @endif
        @endif
        @if(isset($new->new_images[1]))
            <div class="row pb-4 justify-content-center">
                <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                class="active"></li>
                            @for($i = 1; $i < count($new->new_images); $i++)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                            @endfor
                        </ol>
                        <div class="carousel-inner slider">
                            <div class="carousel-item active h-100">
                                <img src="{{$new->new_images[0]->path}}" class="d-block w-100 h-100 slider-img"
                                     alt="...">
                            </div>
                            @for($i = 1; $i < count($new->new_images); $i++)
                                <div class="carousel-item h-100">
                                    <img src="{{$new->new_images[$i]->path}}"
                                         class="d-block w-100 h-100 slider-img"
                                         alt="...">
                                </div>
                            @endfor
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon-dark" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon-dark" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        @elseif(isset($new->new_images[0]))
            <div class="row mb-4 justify-content-center slider">
                <div class="col-md-12 h-100">
                    <img src="{{$new->new_images[0]->path}}" class="d-block w-100 h-100 slider"
                         alt="...">
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                {!! $new->new_content !!}
            </div>
        </div>
    </main>
@endsection