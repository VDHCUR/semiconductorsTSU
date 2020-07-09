@extends('layouts.main')

@section("title")
    Профиль
@endsection

@section('head')
    <link rel="stylesheet" media="all" type="text/css"
          href="{{asset('modules/bootstrap-fileinput/css/fileinput.min.css')}}">
    <link rel="stylesheet" media="all" type="text/css"
          href="{{asset('modules/bootstrap-fileinput/css/fileinput-rtl.css')}}">
@endsection

@section('content')
    <div class="modal fade" id="changeAvatar" tabindex="-1" role="dialog" aria-labelledby="changeAvatarTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeAvatarTitle">Выбрать фото</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/profile/avatar" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" id="photo" name="avatar" accept="image/*" class="form-control-file" required>
                        @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-change rounded-0">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addDocs" tabindex="-1" role="dialog" aria-labelledby="addDocsTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocsTitle">Добавить документы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/profile/upload" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label for="input-id">Прикрепить документы <i>(макс. 5шт.)</i>. Разрешённые типы файлов: <i>.doc(x), .pdf, .xls(x)</i></label>
                        <input type="file" id="input-id" data-preview-file-type="text" name="docs[]" value="{{old('docs')}}" accept="application/pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                               multiple required>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-change rounded-0">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pt-2 pb-3">
            <div class="col-md-6 mb-4">
                <h4 class="font-weight-bold">
                    {{Auth::user()->person->surname}}
                    {{Auth::user()->person->name}}
                    @if(!empty(Auth::user()->person->patronymic))
                        {{Auth::user()->person->patronymic}}
                    @endif
                </h4>
                @if(Auth::user()->is_admin)
                    <a href="/admin" class="text-decoration-none">
                        <button type="button" class="btn btn-primary py-1 rounded-0">Панель администратора</button>
                    </a>
                @endif
            </div>
            <div class="col-sm-6 col-md-7 order-2 order-sm-1">
                <a href="/profile/edit"><h5>Изменить данные</h5></a>
                <h6 class="text-muted">Должность</h6>
                <h5 class="mb-3">{{Auth::user()->person->position}}</h5>
                @if(!empty(Auth::user()->person->degree))
                    <h6 class="text-muted">Научная степень</h6>
                    <h5 class="mb-3">{{Auth::user()->person->degree}}</h5>
                @endif
                @if(!empty(Auth::user()->person->phone))
                    <h6 class="text-muted">Телефон</h6>
                    <h5 class="mb-3">{{Auth::user()->person->phone}}</h5>
                @endif
                <h6 class="text-muted">E-mail</h6>
                <h5 class="mb-3">{{Auth::user()->email}}</h5>
                @if(!empty(Auth::user()->person->link))
                    <a href="{{Auth::user()->person->link}}" class="mb-3"><h5>Страница на Сотрудники.ТГУ</h5></a>
                @endif

                <h5 class="font-weight-bold">Файлы</h5>
                @if(!empty(Auth::user()->person->docs[0]))
                    @for($i = 0; $i < count(Auth::user()->person->docs); $i++)
                        <div class="row justify-content-around mb-3">
                        <a href="{{asset(Auth::user()->person->docs[$i]->path)}}" class="col-md-8 my-auto"><h5 class="d-inline-block">{{Auth::user()->person->docs[$i]->name}} </h5></a>
                        <form method="post" action="/profile/docs/{{Auth::user()->person->docs[$i]->id}}" class="d-inline-block my-auto col-md-4">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger rounded-0 my-auto d-inline-block">Удалить</button>
                        </form>
                        </div>
                    @endfor
                @endif
                @if(count(Auth::user()->person->docs) < 5)
                    <a href="#" data-toggle="modal"
                            data-target="#addDocs">Прикрепить файлы <span>
                            <svg class="bi bi-download" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M.5 8a.5.5 0 01.5.5V12a1 1 0 001 1h12a1 1 0 001-1V8.5a.5.5 0 011 0V12a2 2 0 01-2 2H2a2 2 0 01-2-2V8.5A.5.5 0 01.5 8z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M5 7.5a.5.5 0 01.707 0L8 9.793 10.293 7.5a.5.5 0 11.707.707l-2.646 2.647a.5.5 0 01-.708 0L5 8.207A.5.5 0 015 7.5z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M8 1a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 1z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </a>
                @else
                    <h6>Прикреплено максимальное кол-во файлов. Удалите существующие, чтобы добавить новые.</h6>
                @endif
            </div>
            <div class="col-9 col-sm-6 col-md-5 order-1 order-sm-2 text-center text-sm-right">
                @if(!empty(Auth::user()->person->avatar[0]))
                    <img src="{{Auth::user()->person->avatar[0]->path}}" alt="" class="d-sm-block profile-img">
                @else
                    <img src="{{asset('/img/blank_profile.png')}}" class="d-none d-sm-block profile-img ml-sm-auto">
                @endif
                    <div class="btn-group w-100 mb-3">
                        <a href="#" class="w-100 text-center" data-toggle="modal"
                           data-target="#changeAvatar">
                            Изменить фото
                        </a>
                    </div>
            </div>
        </div>
    </main>
@endsection

@section('bottom')
    <script src="{{asset('modules/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('modules/bootstrap-fileinput/js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('modules/bootstrap-fileinput/js/locales/ru.js')}}" type="text/javascript"></script>
    <script>
        $("#input-id").fileinput({
            uploadAsync: false,
            language: 'ru',
            maxFileCount: {{5 - count(Auth::user()->person->docs)}},
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