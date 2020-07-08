@extends('layouts.main')

@section('title')
    Восстановление пароля
@endsection

@section('content')
    <main class="container mt-auto mb-4 mt-md-auto mb-md-auto">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header text-center">Восстановление пароля</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="text-md-right">Введите ваш E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group mb-0 text-center">
                                    <button type="submit" class="btn w-100 btn-primary rounded-0">
                                        Получить ссылку на изменение пароля
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection