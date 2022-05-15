@extends('admin.comunes.base');
@section('titulo')
    Editar Estudiante
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <b>Editar Estudiante</b>
                    </div>
                    <div class="card-body">
                        <form action="/admin/estudiantes/{{ $estudiante->id }}/editar" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Nombre</label>
                                            <input type="text" value="{{ $estudiante->name }}" class="form-control"
                                                name="name" placeholder="Entre nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">username</label>
                                            <input type="text" value="{{ $estudiante->username }}" class="form-control"
                                                name="username" placeholder="Entre username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nif</label>
                                            <input type="text" value="{{ $estudiante->nif }}" class="form-control"
                                                name="nif" placeholder="Entre el nif">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="" class="control-label">Teléfono</label>
                                            <input type="text" value="{{ $estudiante->telephone }}" class="form-control"
                                                name="telephone" placeholder="Entre el número de teléfono">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="control-label">Email</label>
                                            <input type="email" value="{{ $estudiante->email }}" class="form-control"
                                                name="email" placeholder="Entre el correo">
                                        </div>
                                    </div>
                                    {{-- Cambiar la fecha que no sale --}}
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="" class="control-label">Fecha de registro</label>
                                            <input type="date" value="{{ $estudiante->date_registered->format('d/m/Y') }}" class="form-control"
                                                name="date_registered">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                    Guardar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-arrow-right"></i>
                                    Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
