@extends('admin.comunes.base');
@section('titulo')
    Editar Clases
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <b>Editar Clase</b>
                    </div>
                    <div class="card-body">
                        <form action="/admin/clases/{{ $clase->id }}/editar" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-1">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nombre</label>
                                            <input type="text" value="{{ $clase->name }}" class="form-control"
                                                name="name" placeholder="Entre el nombre de la clase">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="" class="control-label">Color</label>
                                            <input type="color" value="{{ $clase->color }}" class="form-control"
                                                name="color" placeholder="Entre el color de la clase">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Curso</label>
                                            <select name="id_course" id="" class="form-control">
                                                @foreach ($cursos as $curso)
                                                    @if ($curso->id == $clase->id_course)
                                                        <option value="{{ $curso->id }}" selected>{{ $curso->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Profesor</label>
                                            <select name="id_teacher" id="" class="form-control">
                                                @foreach ($profesores as $profesor)
                                                    @if ($profesor->id == $clase->id_teacher)
                                                        <option value="{{ $profesor->id }}" selected>
                                                            {{ $profesor->name }} {{ $profesor->surname }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $profesor->id }}">{{ $profesor->name }}
                                                            {{ $profesor->surname }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Horario</label>
                                            <select name="id_schedule" id="" class="form-control">
                                                @foreach ($horarios as $horario)
                                                    @if ($horario->id == $clase->id_schedule)
                                                        <option value="{{ $horario->id }}" selected>
                                                            {{ $horario->day }} {{ $horario->time_start }} -
                                                            {{ $horario->time_end }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $horario->id }}">{{ $horario->day }}
                                                            {{ $horario->time_start }} - {{ $horario->time_end }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                    Guardar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-arrow-right"></i>
                                    Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
