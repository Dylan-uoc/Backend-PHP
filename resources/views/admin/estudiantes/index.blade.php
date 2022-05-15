@extends('admin.comunes.base');
@section('titulo')
    Estudiantes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="row">
                    <!-- FORM Panel -->

                    <!-- Table Panel -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Lista Alumnos</b>
                                <span class="">

                                    <button data-toggle="modal" data-target="#modalCrearEstudiante"
                                        class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button">
                                        <i class="fa fa-plus"></i>Nuevo</button>
                                </span>
                            </div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="row mb-3 mt-3">
                                        <div class="col-lg-12">
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ Session::get('success') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <table class="table table-bordered table-condensed table-hover">
                                    <colgroup>
                                        <col width="5%">
                                        <col width="20%">
                                        <col width="30%">
                                        <col width="20%">
                                        <col width="10%">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="">Nif</th>
                                            <th class="">Nombre</th>
                                            <th class="">Email</th>
                                            <th class="">Contacto</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estudiantes as $estudiante)
                                            <tr>

                                                <td class="text-center">{{ $estudiante->id }}</td>
                                                <td class="">
                                                    <p><b>{{ $estudiante->nif }}</b></p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ $estudiante->name }} {{ $estudiante->surname }}</b></p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ $estudiante->email }}</b></p>
                                                </td>
                                                <td class="text-right">
                                                    <p><b>{{ $estudiante->telephone }}</b></p>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-outline-primary edit_student"
                                                        type="button" data-id="{{ $estudiante->id }}">Editar</button>
                                                    <button class="btn btn-sm btn-outline-danger delete_student"
                                                        type="button" data-id="{{ $estudiante->id }}">Borrar</button>
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


    <div class="modal fade" id="modalCrearEstudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/estudiantes/guardar" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="name" placeholder="Entre el nombre">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Apellidos</label>
                                    <input type="text" class="form-control" name="surname"
                                        placeholder="Entre los apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="" class="control-label">Nif</label>
                                    <input type="text" class="form-control" name="nif" placeholder="Entre el nif">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="" class="control-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telephone"
                                        placeholder="Entre el número de teléfono">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Entre el correo">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Usuario</label>
                                    <input type="text" class="form-control" name="username" placeholder="Entre el nombre de usuario">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Pass</label>
                                    <input type="password" class="form-control" name="pass"
                                        placeholder="Entre la contraseña">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Fecha Registro</label>
                                    <input type="date" class="form-control" name="date_registered" placeholder="Entre fecha de registro">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-arrow-right"></i>
                            Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('table').DataTable({
                language: {
                    "lengthMenu": "Muestra _MENU_ registros por página",
                    "zeroRecords": "No se encuentra",
                    "info": "Mostrando _PAGE_ of _PAGES_",
                    "infoEmpty": "No hay datos disponibles",
                    "infoFiltered": "(filtrado de un total _MAX_ total records)",
                    "search": "Buscar",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
        });
    </script>
@endsection
