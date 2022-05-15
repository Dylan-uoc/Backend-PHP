@extends('admin.comunes.base');
@section('titulo')
    Editar Profesor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <b>Editar Profesor</b>
                    </div>
                    <div class="card-body">
                        <form action="/admin/profesores/{{ $profesor->id }}/editar" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Nombre</label>
                                            <input type="text" value="{{ $profesor->name }}" class="form-control" name="name"
                                                placeholder="Entre el nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Apellidos</label>
                                            <input type="text" value="{{ $profesor->surname }}" class="form-control" name="surname"
                                                placeholder="Entre los apellidos">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nif</label>
                                            <input type="text" value="{{ $profesor->nif }}" class="form-control" name="nif" placeholder="Entre el nif">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="" class="control-label">Teléfono</label>
                                            <input type="text" value="{{ $profesor->telephone }}" class="form-control" name="telephone"
                                                placeholder="Entre el número de teléfono">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="control-label">Email</label>
                                            <input type="email" value="{{ $profesor->email }}" class="form-control" name="email"
                                                placeholder="Entre el correo">
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
