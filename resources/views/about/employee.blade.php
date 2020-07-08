@extends('layouts.main')

@section('title')
    {{$employee->person->surname}}
    {{$employee->person->name}}
    @if(!empty($employee->person->patronymic))
        {{$employee->person->patronymic}}
    @endif
@endsection

@section('content')

    @if(Auth::check())
        @if(Auth::user()->is_admin)
            @if(Auth::user()->id !== $employee->id)
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="deleteModalTitle">Подтверждение</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Действительно хотите удалить этого сотрудника?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Отмена
                                </button>
                                <form method="post" action="/employees/{{$employee->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger rounded-0">Да, удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @endif
    <main class="container p-4 px-md-5 mb-3" id="main">
        <div class="row pt-2 pb-3">
            <div class="col-12">
                <h4 class="font-weight-bold mb-4">
                    {{$employee->person->surname}}
                    {{$employee->person->name}}
                    @if(!empty($employee->person->patronymic))
                        {{$employee->person->patronymic}}
                    @endif
                </h4>
            </div>
            <div class="col-sm-6 col-md-7 order-2 order-sm-1">
                <h6 class="text-muted">Должность</h6>
                <h5 class="mb-3">{{$employee->person->position}}</h5>
                @if(!empty($employee->person->degree))
                    <h6 class="text-muted">Научная степень</h6>
                    <h5 class="mb-3">{{$employee->person->degree}}</h5>
                @endif
                @if(!empty($employee->person->phone))
                    <h6 class="text-muted">Телефон</h6>
                    <h5 class="mb-3">{{$employee->person->phone}}</h5>
                @endif
                <h6 class="text-muted">E-mail</h6>
                <h5 class="mb-3">{{$employee->email}}</h5>
                @if(!empty($employee->person->link))
                    <a href="{{$employee->person->link}}" class="mb-3"><h5>Ссылка на Сотрудники.ТГУ</h5></a>
                @endif
                @if(!empty($employee->person->docs[0]))
                <h5 class="font-weight-bold">Файлы</h5>
                    @for($i = 0; $i < count($employee->person->docs); $i++)
                        <a href="{{asset($employee->person->docs[$i]->path)}}"><h5 class="pb-2">{{$employee->person->docs[$i]->name}}</h5></a>
                    @endfor
                @endif
            </div>
            <div class="col-9 col-sm-6 col-md-5 order-1 order-sm-2 text-center text-sm-right">
                @if(!empty($employee->person->avatar[0]))
                    <img src="{{$employee->person->avatar[0]->path}}" alt="" class="d-sm-block profile-img">
                @else
                    <img src="{{asset('/img/blank_profile.png')}}" class="d-none d-sm-block profile-img ml-sm-auto">
                @endif
                @if(Auth::check())
                    @if(Auth::user()->is_admin)
                        <form method="POST" action="/logout" class="mb-3">
                            @csrf
                            <div class="btn-group w-100">
                                <a href="/employees/{{$employee->id}}/edit"
                                   class="btn btn-primary rounded-0 h-100 w-50">Изменить
                                </a>
                                @if(Auth::user()->id !== $employee->id)
                                    <button type="button" class="btn btn-danger h-100 w-50 rounded-0"
                                            data-toggle="modal"
                                            data-target="#deleteModal">Удалить
                                    </button>
                                @endif
                            </div>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </main>
@endsection