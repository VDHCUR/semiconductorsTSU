@extends('layouts.main')

@section('title')
    Изменить публикацию
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/profiles">Публикации</a> >
                        <span class="text-muted">Изменить публикацию</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Изменить публикацию</h4>
            </div>
        </div>
        <form action="/publications/{{$publication->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group form-row">
                <div class="col-sm-9">
                    <label for="name">Публикация<span class="text-danger"> *</span></label>
                    <textarea type="text" id="name" name="name" minlength="10" maxlength="500" class="form-control" required>{{$publication->name}}</textarea>
                </div>
                @error('name')
                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @enderror
            </div>
            <div class="form-group form-row">
                <div class="col-sm-4 col-md-3">
                    <label for="deadline">Год публикации <span class="text-danger"> *</span><span class="text-muted"></span></label>
                    <input type="text" minlength="4" maxlength="4" id="deadline" name="year" class="form-control" value="{{$publication->year}}" required>
                    @error('deadline')
                    <div class="invalid-feedback">{{$errors->first('year')}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" name="archived"
                       id="archived" {{ $publication->archived ? 'checked' : '' }}>

                <label class="form-check-label" for="archived">
                    Архивная
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning">Изменить</button>
            </div>
        </form>
    </main>
@endsection

