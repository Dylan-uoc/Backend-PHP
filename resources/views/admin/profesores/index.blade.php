@extends('admin.comunes.base');
@section('titulo')
    Profesores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <b>Lista Profesores</b>
                        <span class="">

                            <button data-toggle="modal" data-target="#modalCrearProfesor"
                                class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button">
                                <i class="fa fa-plus"></i> Nuevo
                            </button>
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
                                @foreach ($profesores as $profesor)
                                    <tr>

                                        <td class="text-center">{{ $profesor->id }}</td>
                                        <td class="">
                                            <p><b>{{ $profesor->nif }}</b></p>
                                        </td>
                                        <td class="">
                                            <p><b>{{ $profesor->name }} {{ $profesor->surname }}</b></p>
                                        </td>
                                        <td class="">
                                            <p><b>{{ $profesor->email }}</b></p>
                                        </td>
                                        <td class="text-right">
                                            <p><b>{{ $profesor->telephone }}</b></p>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-outline-primary"
                                                href="/admin/profesores/editar/{{ $profesor->id }}">Editar</a>
                                            <button class="btn btn-sm btn-outline-danger eliminar_profesor" type="button"
                                                data-id="{{ $profesor->id }}">Borrar</button>
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

    <div class="modal fade" id="modalCrearProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear profesor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/profesores/guardar" method="POST">
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
                        <div class="row">
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

    <div class="modal fade" id="modalEliminarProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                        <h6 class="text-justify">¿Estás seguro que deseas eliminar este profesor? Tener en cuenta que este profesor puede impartir clases y directamente se eliminará dicha clase</h6>
                        <input type="hidden" value="" name="" class="id_profesor">

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

            $('.eliminar_profesor').click(function() {
                var id = $(this).data('id');
                $('.id_profesor').val(id);
                $('.formularioEliminar').attr('action', '/admin/profesores/eliminar/' + id);
                $('#modalEliminarProfesor').modal('show');
            });
        });
    </script>
@endsection
