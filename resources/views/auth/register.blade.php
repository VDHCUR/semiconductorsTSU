@extends('layouts.main')

@section('title')
    Регистрация
@endsection

@section('content')
    <div class="container mt-auto mb-4">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header text-center">Регистрация</div>
                    <div class="card-body">
                        <form method="POST" action="/register" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="surname">Фамилия<span class="text-danger"> *</span></label>
                                        <input type="text" name="surname" id="surname" class="form-control"
                                               value="{{old('surname')}}" minlength="2" maxlength="50" required>
                                        @error('surname')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Имя<span class="text-danger"> *</span></label>
                                        <input type="text" name="first_name" id="name" class="form-control"
                                               value="{{old('first_name')}}"
                                               minlength="2" maxlength="50" required>
                                        @error('first_name')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="patronymic">Отчество</label>
                                        <input type="text" name="patronymic" id="patronymic" class="form-control"
                                               maxlength="50" minlength="2"
                                               value="{{old('patronymic')}}">
                                        @error('patronymic')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail<span class="text-danger"> *</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               value="{{old('email')}}" placeholder="example@mail.com" required
                                               autocomplete="email">
                                        @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Телефон</label>
                                        <input type="tel" name="phone" id="phone" class="form-control"
                                               value="{{old('phone')}}"
                                               placeholder="+7(___)___-__-__">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль<span class="text-danger"> *</span></label>
                                <input type="password" id="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       autocomplete="new-password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Подтвердите пароль<span
                                            class="text-danger"> *</span></label>
                                <input type="password" id="password-confirm" name="password_confirmation"
                                       class="form-control @error('password') is-invalid @enderror"
                                       autocomplete="new-password" required>
                            </div>
                            <div class="form-group">
                                <label for="photo">Фото для профиля</label>
                                <input type="file" id="photo" name="avatar" accept="image/*" class="form-control-file">
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="position">Должность <span
                                                    class="text-danger"> *</span></label>
                                        <input type="text" name="position" id="position" class="form-control"
                                               value="{{old('position')}}" maxlength="100" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="degree">Научная степень</label>
                                        <input type="text" name="degree" id="degree" class="form-control"
                                               value="{{old('degree')}}" maxlength="99">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link">Ссылка на ТГУ.Сотрудники</label>
                                <input type="text" name="link" id="link" class="form-control" value="{{old('link')}}"
                                       maxlength="250" placeholder="https://persona.tsu.ru/...">
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="isadmin"
                                       id="isadmin" {{ old('isadmin') ? 'checked' : '' }}>

                                <label class="form-check-label" for="isadmin">
                                    Администратор сайта
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded-0">Зарегистрировать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom')
    <script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>
    <script>
        $(function () {
            $('#phone').mask("+7-9999999999")
        })
    </script>
@endsection
