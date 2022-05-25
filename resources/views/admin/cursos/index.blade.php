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

                        @if (Session::has('success'))
                            <div class="row mb-3 mt-3">
                                <div class="col-lg-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <!-- FORM Panel -->
                            <div class="col-md-4">
                                <form class="formulario" action="/admin/cursos/guardar" method="POST">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            Cursos
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Cursos</label>
                                                        <input type="text" class="form-control nombreCurso" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Descripcion</label>
                                                        <textarea class="form-control descripcionCurso" cols="30" rows='3' name="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha Inicio</label>
                                                        <input type="date" class="form-control fechaInicio"
                                                            name="date_start">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha Fin</label>
                                                        <input type="date" class="form-control fechaFin" name="date_end">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary col-sm-3 offset-md-3">
                                                        Guardar</button>
                                                    <button class="btn btn-sm btn-warning text-white col-sm-3" type="reset">
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
                                                            <p>Description:
                                                                <small><b>{{ $curso->description }}</b></small>
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-primary editar_curso"
                                                                type="button" data-id="{{ $curso->id }}"
                                                                data-course="{{ $curso->name }}"
                                                                data-description="{{ $curso->description }}"
                                                                data-fechainicio="{{ $curso->date_start }}"
                                                                data-fechafin="{{ $curso->date_end }}">Editar</button>
                                                            <button class="btn btn-sm btn-danger eliminar_curso"
                                                                type="button" data-id="{{ $curso->id }}">Borrar</button>
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


    <div class="modal fade" id="modalEliminarCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formularioEliminar" action="" method="POST">
                    @csrf
                    <div class="modal-body">

                        <h6>¿Estás seguro que deseas eliminar este curso?</h6>
                        <input type="hidden" value="" name="" class="id_curso">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.editar_curso').click(function() {
                start_load();
                var id = $(this).data('id');
                var course = $(this).data('course');
                var description = $(this).data('description');
                var fechaInicio = $(this).data('fechainicio');
                var fechaFin = $(this).data('fechafin');

                $('.nombreCurso').val(course);
                $('.descripcionCurso').val(description);
                $('.fechaInicio').val(fechaInicio);
                $('.fechaFin').val(fechaFin);
                end_load();

                $('.formulario').attr('action', '/admin/cursos/editar/' + id);

            });

            $('.eliminar_curso').click(function() {
                var id = $(this).data('id');
                $('.id_curso').val(id);
                $('.formularioEliminar').attr('action', '/admin/cursos/eliminar/' + id);
                $('#modalEliminarCurso').modal('show');
            });
        });
    </script>
@endsection
