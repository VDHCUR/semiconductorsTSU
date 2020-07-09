@extends('layouts.main')

@section('title')
    Изменить предмет
@endsection

@section('content')
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <h6 class="breadcrumb-item"><a href="/">Главная</a> > <a href="/admin">Панель администратора</a> > <a href="/admin/profiles">Направления</a> >
                        <span class="text-muted">Изменить предмет</span></h6>
                </nav>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm">
                <h4>Изменить предмет по направлению: <br/><span class="font-italic font-weight-normal">"{{$profile->name}}"
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
        <form action="/profiles/{{$profile->id}}/subjects/{{$subject->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="name">Название предмета<span class="text-danger"> *</span></label>
                    <input type="text" minlength="5" maxlength="100" id="name" name="name" class="form-control" value="{{$subject->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$teacher}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-sm-7">
                    <label for="teacher">Преподаватель<span class="text-danger"> *</span></label>
                    <select class="form-control" id="teacher" name="teacher">
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}" @if($employee->id === $subject->teacher->id) selected @endif>
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
                <button type="submit" class="btn btn-warning">Изменить</button>
            </div>
        </form>
    </main>
@endsection

