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
                        <span class="text-muted">История кафедры</span></h6>
                </nav>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col text-center">
                <h4 class="font-weight-bold">История</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(empty($new))
                    <div class="text-center mt-3">
                        <h5 class="text-center">Страницы "История не существует" на данный момент. Чтобы созадть её,
                            добавьте новость с заголовком "История кафедры"</h5>
                        <a href="/news/create" class="text-decoration-none">
                            <button type="button" class="btn btn-primary rounded-0">Добавить новость</button>
                        </a>
                    </div>
                @else
                    <div class="text-center my-1">
                        <a href="/history/edit" class="text-decoration-none">
                            <button type="button" class="btn btn-primary rounded-0 mt-1 mb-3">Изменить информацию
                            </button>
                        </a>
                    </div>
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
                @endif
            </div>
        </div>
    </main>
@endsection
