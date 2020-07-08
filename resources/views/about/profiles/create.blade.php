@extends('layouts.main')

@section('title')
    Добавить направление
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/profiles">Направления</a> >
                        <span class="text-muted">Добавить направление</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Добавить направление</h4>
            </div>
        </div>
        <form action="/profiles" method="post">
            @csrf
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="name">Название направления<span class="text-danger"> *</span></label>
                    <input type="text" minlength="5" maxlength="100" id="name" name="name" class="form-control" required
                           value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="stage">Степень<span class="text-danger"> *</span></label>
                    <select class="form-control" id="stage" name="stage">
                        <option value="0">Бакалавриат</option>
                        <option value="1">Магистратура</option>
                    </select>
                    @error('stage')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary rounded-0">Добавить</button>
            </div>
        </form>
    </main>
@endsection
