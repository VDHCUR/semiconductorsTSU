@extends('layouts.main')

@section('title')
    Регистрация
@endsection

@section('content')
    <div class="container mt-auto mb-auto">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-header text-center">Регистрация</div>
                    <div class="card-body">
                        <p class="text-center">Пользователь успешно зарегистрирован!</p>
                        <a href="/admin"><p class="text-center">Панель администратора</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection