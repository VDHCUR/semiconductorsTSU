@extends('layouts.main')

@section('title')
    Добавить информацию для аспирантов
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
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/aspirant">Аспирантура</a> >
                        <span class="text-muted">Добавить сведения для аспирантов</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Добавить сведения для аспирантов</h4>
            </div>
        </div>
        <form action="/aspirant" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="text">Информация <span class="text-danger"> *</span></label>
                    <textarea id="text" name="info">{{old('info')}}</textarea>
                    @error('info')
                    <div class="invalid-feedback">
                        {{$errors->first('info')}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-id">Прикрепить документы <i>(макс. 5)</i>. Разрешённые типы файлов: <i>.doc(x), .pdf, .xls(x)</i></label>
                    <input type="file" id="input-id" data-preview-file-type="text" name="docs[]" value="{{old('docs')}}" accept="application/pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                           multiple>
                    @error('docs')
                    <div class="invalid-feedback">
                        {{$errors->first('docs')}}
                    </div>
                    @enderror
                    @error('docs.*')
                    <div class="invalid-feedback">
                        {{$errors->first('docs.*')}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded-0">Добавить</button>
                </div>
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
            height: 450,
        });
        $("#input-id").fileinput({
            uploadAsync: false,
            language: 'ru',
            maxFileCount: 5,
            showUpload: false,
            maxFileSize: 10000,
            hideThumbnailContent: true,
            allowedFileExtensions: ['doc', 'docx', 'xls', 'xlsx', 'pdf'],
            showRemove: true,
            showZoom: false,
            layoutTemplates: {
                actions: '',
                indicator: '',
            }
        });
    </script>
@endsection