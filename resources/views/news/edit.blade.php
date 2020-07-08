@extends('layouts.main')

@section('title')
    Изменить новость
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
                        <span class="text-muted">Изменить новость</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Изменить новость</h4>
            </div>
        </div>
        <form action="/news/{{$new->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="header">Заголовок<span class="text-danger"> *</span></label>
                <input type="text" minlength="10" name="new_header"
                       class="form-control {{$errors->has('new_header') ? 'is-invalid' : ''}}" id="header"
                       value="{{$new->new_header}}" maxlength="100">
                @error('new_header')
                <div class="invalid-feedback">{{$errors->first('new_header')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lead">Подзаголовок</label>
                <input type="text" minlength="10" maxlength="100" name="new_lead"
                       class="form-control {{$errors->has('new_lead') ? 'is-invalid' : ''}}" id="lead"
                       value="{{$new->new_lead}}">
                @error('new_lead')
                <div class="invalid-feedback">{{$errors->first('new_lead')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="text">Содержание новости<span class="text-danger"> *</span></label>
                <textarea id="text" name="new_content" minlength="20">{{$new->new_content}}</textarea>
                @error('new_content')
                <div class="invalid-feedback">
                    {{$errors->first('new_content')}}
                </div>
                @enderror
            </div>
            @if(!empty($new->new_images[0]))
                <h5>Поставьте галочки под теми фото, которые хотите удалить:</h5>
                <div class="form-group form-check-inline">
                    <div class="container">
                        @for($i = 0; $i < count($new->new_images); $i++)
                            <div class="edit-group mx-1">
                                <img src="{{$new->new_images[$i]->path}}" alt="" class="edit-img-preview">
                                <input type="checkbox" name="img_to_delete[]" value="{{$new->new_images[$i]->id}}"
                                       class="d-block mx-auto my-2 form-check-input">
                            </div>
                        @endfor
                    </div>
                </div>
            @endif
            @if(count($new->new_images) < 10)
                <div class="form-group">
                    <label for="input-id">Загрузить фото. Разрешённые типы файлов: <i>.jpeg,
                            .jpg, .png</i></label>
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
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-warning">Изменить новость</button>
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
            maxFileCount: {{10 - count($new->new_images)}},
            showUpload: false,
            maxFileSize: 10000,
            showRemove: true,
            showZoom: false,
            allowedFileExtensions: ['jpeg', 'jpg', 'png'],
            layoutTemplates: {
                actions: '',
                indicator: '',
            }
        });
    </script>

@endsection