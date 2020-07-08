@extends('layouts.main')

@section('title')
    Добавить предмет
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/profiles">Направления</a> >
                        <span class="text-muted">Добавить предмет</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Добавить предмет по направлению: <br/><span class="font-italic font-weight-normal">"{{$profile->name}}"
                    <span class="text-muted">
                        @if($profile->stage === 0)
                            (Бакалавриат)
                        @elseif($profile->stage === 1)
                            (Магистратура)
                        @endif
                    </span>
                    </span>

                </h4>
            </div>
        </div>
        <form action="/profiles/{{$profile->id}}" method="post">
            @csrf
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="name">Название предмета</label>
                    <input type="text" minlength="5" maxlength="100" id="name" name="name" class="form-control" value="{{old('name')}}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="teacher">Преподаватель</label>
                    <select class="form-control" id="teacher" name="teacher" required>
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}">
                                {{$employee->surname}} {{$employee->name}}
                                @if(!empty($employee->patronymic))
                                    {{$employee->patronymic}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('teacher')
                    <div class="invalid-feedback">
                        {{$teacher}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </main>
@endsection
