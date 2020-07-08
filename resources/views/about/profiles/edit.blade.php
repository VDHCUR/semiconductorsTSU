@extends('layouts.main')

@section('title')
    Изменить направление
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/profiles">Направления</a> >
                        <span class="text-muted">Изменить направление</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Изменить направление</h4>
            </div>
        </div>
        <form action="/profiles/{{$profile->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="name">Название направления<span class="text-danger"> *</span></label>
                    <input type="text" minlength="5" maxlength="100" id="name" name="name" class="form-control" value="{{$profile->name}}">
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
                    <select class="form-control" id="stage" name="stage" required>
                        <option value="0" {{$profile->stage ? "" : "selected"}}>Бакалавриат</option>
                        <option value="1" {{$profile->stage ? "selected" : ""}}>Магистратура</option>
                    </select>
                    @error('stage')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning rounded-0">Изменить</button>
            </div>
        </form>
    </main>
@endsection
