@extends('layouts.main')

@section('title')
    Фотогалерея
@endsection

@section('content')
    <main class="container pl-md-0 mb-3">
        <div class="row pb-3">
            <div class="col-md-3 sidebar d-none d-md-block">
                <a href="/profiles" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Направления</div>
                </a>
                <div class="btn btn-light w-100 rounded-0 active mb-2 shadow-sm">История</div>
                <a href="/employees" class="text-decoration-none">
                    <div class="btn btn-light w-100 rounded-0 mb-2 shadow-sm">Cотрудники</div>
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
                                <span class="text-muted">История</span></h6>
                        </nav>
                    </div>
                </div>
                <div class="row pt-2 pb-1">
                    <div class="col text-center">
                        <h4 class="font-weight-bold">История</h4>
                    </div>
                </div>
                @if(!empty($new))
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
                    @else
                    <h5>Будет добавлено</h5>
                @endif
            </div>
        </div>
    </main>
@endsection
