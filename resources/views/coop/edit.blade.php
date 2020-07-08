@extends('layouts.main')

@section('title')
    Изменить сотрудничающую организацию
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/coop">Сотрудничество</a> >
                        <span class="text-muted">Изменить данные сотрудничающей организации</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Изменить данные сотрудничающей организации</h4>
            </div>
        </div>
        <form action="/coop/{{$coop->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="name">Название организации <span class="text-danger"> *</span></label>
                    <input type="text" minlength="5" maxlength="200" id="name" name="name" class="form-control" value="{{$coop->name}}" required>
                    @error('name')
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="place">Место <span class="text-danger"> *</span></label>
                    <input type="text" minlength="2" maxlength="100" id="place" name="place" class="form-control" value="{{$coop->place}}" required>
                </div>
                @error('place')
                <div class="invalid-feedback">{{$errors->first('place')}}</div>
                @enderror
            </div>
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="link">Ссылка</label>
                    <input type="text" minlength="4" maxlength="200" id="link" name="link" class="form-control" value="{{$coop->link}}">
                    @error('link')
                    <div class="invalid-feedback">{{$errors->first('link')}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" name="global"
                       id="archived" {{ $coop->global ? 'checked' : '' }}>
                <label class="form-check-label" for="archived">
                    Международное сотрудничество
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning">Изменить</button>
            </div>
        </form>
    </main>
@endsection
