@extends('layouts.main')

@section('title')
    Авторизация
@endsection

@section('content')
    <main class="container mt-auto mb-4 mt-md-auto mb-md-auto">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header text-center">Авторизация</div>
                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="form-group">
                                <label for="mail">E-mail</label>
                                <input type="email" name="email" id="mail" class="form-control"
                                       value="{{old('email')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить') }}
                                    </label>
                                </div>
                            </div>
                            @error('email')
                            <div class="invalid-feedback">{{$errors->first('email')}}</div>
                            @enderror
                            <div class="form-group text-center mb-2">
                                <button type="submit" class="btn btn-primary rounded-0">Войти</button>
                            </div>
                            <div class="form-group mb-0 text-center">
                            <a href="/password/reset">Забыли пароль?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
