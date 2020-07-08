@extends('layouts.main')

@section('title')
    Изменить пользовательские данные
@endsection

@section('content')
    <div class="container mt-auto mb-4">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header text-center">Изменить пользовательские данные</div>
                    <div class="card-body">
                        <form method="POST" action="/employees/{{$employee->id}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-0">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="surname">Фамилия<span class="text-danger"> *</span></label>
                                        <input type="text" name="surname" id="surname" class="form-control"
                                               value="{{$employee->person->surname}}" minlength="2" maxlength="50">
                                        @error('surname')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Имя<span class="text-danger"> *</span></label>
                                        <input type="text" name="first_name" id="name" class="form-control"
                                               value="{{$employee->person->name}}"
                                               minlength="2" maxlength="50">
                                        @error('first_name')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="patronymic">Отчество</label>
                                        <input type="text" name="patronymic" id="patronymic" class="form-control"
                                               maxlength="50"
                                               value="{{$employee->person->patronymic}}">
                                    </div>
                                    @error('patronymic')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail<span class="text-danger"> *</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               value="{{$employee->email}}" placeholder="example@mail.com"
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
                                               value="{{$employee->person->phone}}"
                                               placeholder="+7(___)___-__-__">
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->id === $employee->id)
                                <div class="form-group">
                                    <label for="password">Пароль<span class="text-danger"> *</span></label>
                                    <input type="password" id="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           autocomplete="new-password">
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
                                           autocomplete="new-password">
                                </div>
                            @endif
                            @if(Auth::user()->is_admin)
                                <div class="form-group mb-0">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="position">Должность</label>
                                            <input type="text" name="position" id="position" class="form-control"
                                                   value="{{$employee->person->position}}" maxlength="100">
                                            @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="degree">Научная степень</label>
                                            <input type="text" name="degree" id="degree" class="form-control"
                                                   value="{{$employee->person->degree}}" maxlength="99">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="link">Ссылка на ТГУ.Сотрудники</label>
                                    <input type="text" name="link" id="link" class="form-control"
                                           value="{{$employee->person->link}}"
                                           maxlength="250" placeholder="https://persona.tsu.ru/...">
                                </div>
                                @if(Auth::user()->id !== $employee->id)
                                    <div class="form-group form-check">
                                        <input class="form-check-input" type="checkbox" name="isadmin"
                                               id="isadmin" {{ $employee->is_admin ? 'checked' : '' }}>

                                        <label class="form-check-label" for="isadmin">
                                            Администратор сайта
                                        </label>
                                    </div>
                                @endif
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning rounded-0">Изменить</button>
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
            $('#phone').mask("+7(999)999-99-99")
        })
    </script>
@endsection
