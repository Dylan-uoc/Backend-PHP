@extends('admin.comunes.base')
@section('titulo')
    Cursos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        Gestión de cursos
                        <hr>

                        <div class="row">
                            <!-- FORM Panel -->
                            <div class="col-md-4">
                                <form action="" id="manage-course">
                                    <div class="card">
                                        <div class="card-header">
                                            Cursos
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" name="id">
                                            <div class="form-group">
                                                <label class="control-label">Cursos</label>
                                                <input type="text" class="form-control" name="course">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Descripcion</label>
                                                <textarea class="form-control" cols="30" rows='3' name="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-sm btn-primary col-sm-3 offset-md-3">
                                                        Guardar</button>
                                                    <button class="btn btn-sm btn-default col-sm-3" type="button"
                                                        onclick="_reset()">
                                                        Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- FORM Panel -->

                            <!-- Table Panel -->
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Lista de cursos</b>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Curso</th>
                                                    <th class="text-center">Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cursos as $curso)
                                                <tr>
                                                    <td class="text-center">{{ $curso->id }}</td>
                                                    <td class="">
                                                        <p>Cursos: <b>{{ $curso->name }}</p>
                                                        <p>Description: <small><b>{{ $curso->description }}</b></small></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-primary edit_course" type="button" data-id="{{ $curso->id }}" data-course="{{ $curso->name }}" data-description="{{ $curso->description }}" >Editar</button>
                                                        <button class="btn btn-sm btn-danger delete_course" type="button" data-id="{{ $curso->id }}">Borrar</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Table Panel -->
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
