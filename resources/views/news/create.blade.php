@extends('layouts.main')

@section('title')
    Добавить новость
@endsection

@section('head')
    <link rel="stylesheet" media="all" type="text/css"
          href="{{asset('modules/bootstrap-fileinput/css/fileinput.min.css')}}">
    <link rel="stylesheet" media="all" type="text/css"
          href="{{asset('modules/bootstrap-fileinput/css/fileinput-rtl.css')}}">
@endsection

@section('content')
    <main class="container p-4" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/news">Новости</a> >
                        <span class="text-muted">Добавить новость</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Добавить новость</h4>
            </div>
        </div>
        <form action="/news" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="header">Заголовок<span class="text-danger"> *</span></label>
                <input type="text" minlength="10" name="new_header"
                       class="form-control {{$errors->has('new_header') ? 'is-invalid' : ''}}" id="header"
                       value="{{old('new_header')}}" required maxlength="100">
                @error('new_header')
                <div class="invalid-feedback">{{$errors->first('new_header')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lead">Подзаголовок</label>
                <input type="text" minlength="10" maxlength="100" name="new_lead"
                       class="form-control {{$errors->has('new_lead') ? 'is-invalid' : ''}}" id="lead"
                       value="{{old('new_lead')}}">
                @error('new_lead')
                <div class="invalid-feedback">{{$errors->first('new_lead')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="text">Содержание новости<span class="text-danger"> *</span></label>
                <textarea id="text" name="new_content">{{old('new_content')}}</textarea>
                @error('new_content')
                <div class="invalid-feedback">
                    {{$errors->first('new_content')}}
                </div>
                @enderror
            </div>
            <div class="form-group">

            </div>
            <div class="form-group">
                <label for="input-id">Загрузить фото (первое изображение будет главным). Разрешённые типы файлов: <i>.jpeg, .jpg, .png</i></label>
                <input type="file" id="input-id" data-preview-file-type="text" name="images[]" accept="image/*"
                       multiple>
                @error('images')
                <div class="invalid-feedback">
                    {{$errors->first('images')}}
                </div>
                @enderror
                @error('images.*')
                    <div class="invalid-feedback">
                        {{$errors->first('images.*')}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary rounded-0">Создать новость</button>
            </div>
        </form>
    </main>
@endsection

@section('bottom')
    <script src="{{asset('modules/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('modules/bootstrap-fileinput/js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('modules/bootstrap-fileinput/js/locales/ru.js')}}" type="text/javascript"></script>
    <script>
        tinymce.init({
            selector: '#text',
            language: 'ru',
            height: 400,
        });
        $("#input-id").fileinput({
            uploadAsync: false,
            language: 'ru',
            allowedFileExtensions: ['jpeg', 'jpg', 'png'],
            maxFileCount: 10,
            maxFileSize: 10000,
            showUpload: false,
            showRemove: true,
            showZoom: false,
            layoutTemplates: {
                actions: '',
                indicator: '',
            }
        });
    </script>

@endsection