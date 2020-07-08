@extends('layouts.main')

@section('title')
    Новости
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pt-2 pb-3">
            <div class="col text-center ">
                <h4 class="font-weight-bold">Новости кафедры</h4>
            </div>
        </div>
        @if(empty($news[0]))
            <div class="row text-center">
                <div class="col"><h5>Новостей пока что нет, но в скором времени они появятся :)</h5></div>
            </div>
        @elseif(empty($news[1]))
            <div class="row">
                <div class="col-sm-12 col-md-6 p-1">
                    <a href="/news/{{$news[0]->id}}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm bg-light border-news-dark rounded-0">
                            @if(isset($news[0]->new_images[0]))
                                <img src="{{asset($news[0]->new_images[0]->path)}}" alt=""
                                     class="card-img-top first-new-img rounded-0">
                            @else
                                <img src="{{asset('/img/blank.jpg')}}" alt=""
                                     class="card-img-top first-new-img rounded-0">
                            @endif
                            <div class="card-body pb-0">
                                <h5 class="card-title">
                                    {{$news[0]->new_header}}
                                </h5>
                                @if(isset($news[0]->new_lead))
                                    <div class="card-text">
                                        <h6 class="text-dark">
                                            {{$news[0]->new_lead}}
                                        </h6>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <h6 class="text-muted d-block">
                                    {{date('H:i d.m.Y', strtotime($news[0]->created_at))}}
                                </h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @elseif(!empty($news[1]))
            <div class="row">
                @for($i = 0; $i < 2; $i++)
                    <div class="col-sm-12 col-md-6 p-1">
                        <a href="/news/{{$news[$i]->id}}" class="text-decoration-none">
                            <div class="card h-100 shadow-sm bg-light border-news-dark rounded-0">
                                @if(isset($news[$i]->new_images[0]))
                                    <img src="{{asset($news[$i]->new_images[0]->path)}}" alt=""
                                         class="card-img-top first-new-img rounded-0">
                                @else
                                    <img src="{{asset('/img/blank.jpg')}}" alt=""
                                         class="card-img-top first-new-img rounded-0">
                                @endif
                                <div class="card-body pb-0">
                                    <h5 class="card-title">
                                        {{$news[$i]->new_header}}
                                    </h5>
                                    @if(isset($news[$i]->new_lead))
                                        <div class="card-text">
                                            <h6 class="text-dark">
                                                {{$news[$i]->new_lead}}
                                            </h6>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <h6 class="text-muted d-block">
                                        {{date('H:i d.m.Y', strtotime($news[$i]->created_at))}}
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        @endif
        @if(!empty($news[2]))
            @for($i = 2; $i < (count($news)); $i++)
                @if($i % 3 === 2)
                    <div class="row mb-4 ">
                        @endif
                        <div class="col-sm-12 col-lg-4 p-1">
                            <a href="/news/{{$news[$i]->id}}" class="text-decoration-none">
                                <div class="card h-100 shadow-sm bg-light border-news-dark rounded-0">
                                    @if(isset($news[$i]->new_images[0]))
                                        <img src="{{asset($news[$i]->new_images[0]->path)}}" alt=""
                                             class="card-img-top secondary-new-img rounded-0">
                                    @else
                                        <img src="{{asset('/img/blank.jpg')}}" alt=""
                                             class="card-img-top secondary-new-img rounded-0">
                                    @endif
                                    <div class="card-body pb-0">
                                        <h5 class="card-title">
                                            {{$news[$i]->new_header}}
                                        </h5>
                                        @if(isset($news[$i]->new_lead))
                                            <div class="card-text">
                                                <h6 class="text-dark">
                                                    {{$news[$i]->new_lead}}
                                                </h6>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-footer bg-transparent border-0">
                                        <h6 class="text-muted d-block">
                                            {{date('H:i d.m.Y', strtotime($news[$i]->created_at))}}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @if($i % 3 === 1)
                    </div>
                @endif
            @endfor
        @endif
    </main>
@endsection