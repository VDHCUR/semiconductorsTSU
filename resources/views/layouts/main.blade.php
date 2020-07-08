<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Разработка: Константин Егоров, Дизайн: Евгений Терещенко">
    <title>@yield('title') - Кафедра физики полупроводников ТГУ</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    @yield('head')
</head>
<body class="d-flex flex-column h-100">
<header class="container-fluid shadow-sm py-1">
    <div class="container">
        <div class="row">
            <a class="col-3 col-md-2 text-center pl-1 pl-sm-3" href="/"><img class="logo m-1 float-md-left"
                                                                             src="{{asset('/img/logos/logo_ff.png')}}"
                                                                             alt="Логотип физического факультета ТГУ"></a>
            <div class="col-9 col-md-8 p-0  my-auto"><h4 class="text-left text-md-center text-uppercase mt-2"
                                                         id="headtitle">Кафедра физики
                    полупроводников</h4></div>
            <div class="d-none d-md-block col-md-2 my-auto text-right">
                @if(Request::path() !== 'profile')
                    <a class="nav-link p-0 w-100 h-100 text-primary {{Request::path() === 'login' ? 'active' : ''}}"
                       href="
                       @if(Auth::check())
                       {{Request::path() === 'profile' ? '#' : '/profile'}}
                       @else
                       {{Request::path() === 'login' ? '#' : '/login'}}
                       @endif">
                        <div class="auth-button btn btn-outline-primary ml-auto">
                            <svg class="d-block bi bi-person-fill h-100 mx-auto my-2 my-md-0" width="1em" height="1em"
                                 viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                 style="padding-right: 1px;">
                                <path fill-rule="evenodd"
                                      d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </a>
                @else
                    <form method="POST" action="/logout" class="my-auto">
                        @csrf
                        <button type="submit" class="auth-button btn btn-outline-primary p-1">
                            <svg class="d-block bi bi-box-arrow-right" style="margin-left: 0.4rem; margin-top: 0.1rem"
                                 width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M11.646 11.354a.5.5 0 010-.708L14.293 8l-2.647-2.646a.5.5 0 01.708-.708l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0z"
                                      clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M4.5 8a.5.5 0 01.5-.5h9a.5.5 0 010 1H5a.5.5 0 01-.5-.5z"
                                      clip-rule="evenodd"/>
                                <path fill-rule="evenodd"
                                      d="M2 13.5A1.5 1.5 0 01.5 12V4A1.5 1.5 0 012 2.5h7A1.5 1.5 0 0110.5 4v1.5a.5.5 0 01-1 0V4a.5.5 0 00-.5-.5H2a.5.5 0 00-.5.5v8a.5.5 0 00.5.5h7a.5.5 0 00.5-.5v-1.5a.5.5 0 011 0V12A1.5 1.5 0 019 13.5H2z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</header>
<div class="container-md p-0 mb-3 bg-primary shadow-sm">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <nav class="navbar navbar-expand-md navbar-dark bg-primary" id="navbuttons">
                <button class="navbar-toggler w-100" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse h-100 w-100" id="navbarNav">
                    <ul class="navbar-nav w-100 h-100">
                        <li class="nav-item w-100 h-100">
                            <a class="nav-link btn btn-primary text-uppercase {{Request::path() === 'news' ? 'active' : ''}}"
                               href="{{Request::path() === 'news' ? '#' : '/news'}}">Новости </a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link btn btn-primary text-uppercase {{Request::path() === 'about' ? 'active' : ''}}"
                               href="{{Request::path() === 'about' ? '#' : '/about'}}">О кафедре</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link btn btn-primary text-uppercase {{Request::path() === 'student' ? 'active' : ''}}"
                               href="{{Request::path() === 'student' ? '#' : '/student'}}">Студенту</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link btn btn-primary text-uppercase {{Request::path() === 'science' ? 'active' : ''}}"
                               href="{{Request::path() === 'science' ? '#' : '/science'}}">Наука</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

@yield('content')

<footer class="container-fluid footer mt-auto pt-3 pb-3">
    <div class="container">
        <div class="row pt-2">
            <div class="col-6 col-md-2 text-center text-md-right my-auto">
                <a href="http://ff.tsu.ru/" class="text-decoration-none">
                <img class="footer-logo float-none mx-auto mx-md-0" src="{{asset('img/logos/logo_ff_mono.png')}}"
                     alt="<Логотип физического факультета ТГУ">
                </a>
            </div>
            <div class="col-6 col-md-2 text-center text-md-left my-auto mr-auto">
                <a href="http://www.tsu.ru/" class="text-decoration-none">
                <img class="footer-logo text-center" src="{{asset('/img/logos/tsu_mono.svg')}}" alt="Логотип ТГУ">
                </a>
            </div>
            <div class="row col mx-auto my-md-auto mx-md-0 py-4 py-md-0 pl-md-0 pr-md-0 justify-content-center">
                <a href="http://www.tsu.ru/" class="footer-link col-4 col-md-3 p-0"><h5
                            class="text-center text-md-left">Сайт ТГУ</h5></a>
                <a href="http://ff.tsu.ru/" class="footer-link col-4 col-md-3 p-0"><h5
                            class="text-center text-md-left">Сайт ФФ</h5></a>
                <a href="#" class="footer-link col-4 col-md-3 p-0"><h5 class="text-center text-md-left">Почта ФФ</h5>
                </a>
            </div>
            <div class="col-md-3 text-center text-md-left text-light pl-md-4 pl-lg-5 pr-md-0 ">
                @if(!empty($director->person))
                    <h5>Контакты</h5>
                    <h6 class="mb-1">Зав. кафедрой:</h6>
                    <h6 class="mb-1">{{$director->person->surname}} {{$director->person->name}} @if(!empty($director->person->patronymic)) {{$director->person->patronymic}} @endif</h6>
                    <h6 class="mb-1">e-mail: {{$director->email}}</h6>
                    <h6 class="mb-1">тел.: {{$director->person->phone}} </h6>
                @endif
            </div>
        </div>
        <p class="d-none">Разработка: Константин Егоров, дизайн: Евгений Терещенко</p>
    </div>
</footer>
@yield('bottom')
</body>
</html>
