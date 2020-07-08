@extends('layouts.main')

@section('title')
    Панель администратора
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-1">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/profile"><- Вернутся в профиль</a>
                </nav>
            </div>
        </div>
        <div class="row pt-2 pb-3">
            <div class="col text-center ">
                <h4 class="font-weight-bold">Панель администратора</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 px-1">
                <a href="/admin/news" class="text-decoration-none">
                    <div class="card mb-2 admin-card border-news-dark shadow-sm rounded-0">
                        <div class="card-body">
                            <div class="card-title my-auto text-center">
                                Новости
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 px-1">
                <a href="/admin/employees" class="text-decoration-none">
                    <div class="card mb-2 admin-card border-news-dark shadow-sm rounded-0">
                        <div class="card-body">
                            <div class="card-title my-auto text-center">
                                Сотрудники
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 px-1">
                <a href="/admin/profiles" class="text-decoration-none">
                    <div class="card mb-2 admin-card border-news-dark shadow-sm rounded-0">
                        <div class="card-body">
                            <div class="card-title my-auto text-center">
                                Направления и предметы
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 px-1">
                <a href="/admin/projects" class="text-decoration-none">
                    <div class="card mb-2 admin-card border-news-dark shadow-sm rounded-0">
                        <div class="card-body">
                            <div class="card-title my-auto text-center">
                                Проекты
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 px-1">
                <a href="/admin/publications" class="text-decoration-none">
                    <div class="card mb-2 admin-card border-news-dark shadow-sm rounded-0">
                        <div class="card-body">
                            <div class="card-title my-auto text-center">
                                Публикации
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 px-1">
                <a href="/admin/coop" class="text-decoration-none">
                    <div class="card mb-2 admin-card border-news-dark shadow-sm rounded-0">
                        <div class="card-body">
                            <div class="card-title my-auto text-center">
                                Сотрудничество
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 px-1">
                <a href="/admin/history" class="text-decoration-none">
                    <div class="card mb-2 admin-card border-news-dark shadow-sm rounded-0">
                        <div class="card-body">
                            <div class="card-title my-auto text-center">
                                История
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 px-1">
                <a href="/admin/aspirant" class="text-decoration-none">
                    <div class="card mb-2 admin-card border-news-dark shadow-sm rounded-0">
                        <div class="card-body">
                            <div class="card-title my-auto text-center">
                                Аспирантура
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
@endsection
