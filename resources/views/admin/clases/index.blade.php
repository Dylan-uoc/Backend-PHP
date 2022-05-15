@extends('admin.comunes.base');
@section('titulo')
    Clases
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
                                <b>Lista Clases</b>
                                <span class="">

                                    <button data-toggle="modal" data-target="#modalCrearClase"
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
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="">Nombre</th>
                                            <th class="">Curso</th>
                                            <th class="">Profesor</th>
                                            <th class="">Fecha</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clases as $clase)
                                            <tr>
                                                <td class="text-center">{{ $clase->id }}</td>
                                                <td class="">
                                                    <p><b>{{ $clase->name }}</b></p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ App\Models\Profesor::find($clase->id_teacher)->name }}
                                                            {{ App\Models\Profesor::find($clase->id_teacher)->surname }}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ App\Models\Cursos::find($clase->id_course)->name }}</b></p>
                                                </td>
                                                <td class="text-right">
                                                    <p><b>{{ App\Models\Calendario::find($clase->id_schedule)->day }}</b>
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-outline-primary"
                                                        href="/admin/clases/editar/{{ $clase->id }}">Editar</a>
                                                    <button class="btn btn-sm btn-outline-danger eliminar_clase"
                                                        type="button" data-id="{{ $clase->id }}">Borrar</button>
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

    <div class="modal fade" id="modalCrearClase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/clases/guardar" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-1">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Entre el nombre de la clase">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="" class="control-label">Color</label>
                                    <input type="color" class="form-control" name="color"
                                        placeholder="Entre el color de la clase">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Curso</label>
                                    <select name="id_course" id="" class="form-control">
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Profesor</label>
                                    <select name="id_teacher" id="" class="form-control">
                                        @foreach ($profesores as $profesor)
                                            <option value="{{ $profesor->id }}">{{ $profesor->name }}
                                                {{ $profesor->surname }}</option>
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
                                            <option value="{{ $horario->id }}">{{ $horario->day }} (Desde:
                                                {{ $horario->time_start }} Hasta: {{ $horario->time_end }})</option>
                                        @endforeach
                                    </select>

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

    <div class="modal fade" id="modalEliminarClase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                        <h6>¿Estás seguro que deseas eliminar esta clase?</h6>
                        <input type="hidden" value="" name="" class="id_clase">

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

            $('.eliminar_clase').click(function() {
                var id = $(this).data('id');
                $('.id_clase').val(id);
                $('.formularioEliminar').attr('action', '/admin/clases/eliminar/' + id);
                $('#modalEliminarClase').modal('show');
            });
        });
    </script>
@endsection
