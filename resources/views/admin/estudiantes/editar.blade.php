@extends('admin.comunes.base');
@section('titulo')
    Estudiantes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Editar Alumno</b>
                            </div>
                            <form action="/admin/estudiantes/editar/{{ $estudiante->id }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Nombre</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Entre el nombre" value="{{ $estudiante->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Apellidos</label>
                                                <input type="text" class="form-control" name="surname"
                                                    placeholder="Entre los apellidos" value="{{ $estudiante->surname }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="" class="control-label">Nif</label>
                                                <input type="text" class="form-control" name="nif"
                                                    placeholder="Entre el nif" value="{{ $estudiante->nif }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="" class="control-label">Teléfono</label>
                                                <input type="text" class="form-control" name="telephone"
                                                    placeholder="Entre el número de teléfono"
                                                    value="{{ $estudiante->telephone }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Entre el correo" value="{{ $estudiante->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Usuario</label>
                                                <input type="text" class="form-control" name="username"
                                                    placeholder="Entre el nombre de usuario"
                                                    value="{{ $estudiante->username }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Pass</label>
                                                <input type="password" class="form-control" name="pass"
                                                    placeholder="Entre la contraseña" value="{{ $estudiante->pass }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Fecha Registro</label>
                                                <input type="date" class="form-control" name="date_registered"
                                                    placeholder="Entre fecha de registro"
                                                    value="{{ date('Y-m-d', strtotime($estudiante->date_registered)) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                        Guardar</button>
                                    <a href="/admin/estudiantes" class="btn btn-secondary"><i class="fa fa-arrow-right"></i>
                                        Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
