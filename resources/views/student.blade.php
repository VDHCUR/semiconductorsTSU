@extends('layouts.main')

@section('title')
    Студенту
@endsection

@section('content')
<main class="container p-4 px-md-5 mb-3" id="main">
    <div class="row pt-2 pb-3">
        <div class="col text-center">
            <h4 class="font-weight-bold">Студенту</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-7 p-1">
            <a href="/student/bachelor">
                <div class="card h-100 rounded-0">
                    <img src="{{asset('img/student/bachelor.jpg')}}" class="card-img-top about-img rounded-0">
                    <div class="card-img-overlay">
                        <h4 class="card-title text-light mx-auto">Бакалавриат</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-5 p-1">
            <a href="/student/magistr">
                <div class="card h-100 rounded-0">
                    <img src="{{asset('img/student/magistr.jpg')}}" class="card-img-top about-img rounded-0">
                    <div class="card-img-overlay">
                        <h4 class="card-title text-light mx-auto">Магистратура</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5 p-1">
            <a href="/student/contacts">
                <div class="card h-100 rounded-0">
                    <img src="{{asset('img/student/contacts.jpg')}}" class="card-img-top about-img rounded-0">
                    <div class="card-img-overlay">
                        <h4 class="card-title text-light mx-auto">Контакты</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-7 p-1">
            <a href="/student/aspirant">
                <div class="card h-100 rounded-0">
                    <img src="{{asset('img/student/aspirant.jpg')}}" class="card-img-top about-img rounded-0">
                    <div class="card-img-overlay">
                        <h4 class="card-title text-light mx-auto">Аспирантура</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>

</main>
@endsection