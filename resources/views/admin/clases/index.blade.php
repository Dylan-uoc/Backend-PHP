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

                                    <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button"
                                        id="new_student">
                                        <i class="fa fa-plus"></i>Nuevo</button>
                                </span>
                            </div>
                            <div class="card-body">

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
                                                    <p><b>{{ App\Models\Profesor::find($clase->id_teacher)->name }} {{ App\Models\Profesor::find($clase->id_teacher)->surname }}</b></p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ App\Models\Cursos::find($clase->id_course)->name }}</b></p>
                                                </td>
                                                <td class="text-right">
                                                    <p><b>{{ App\Models\Calendario::find($clase->id_schedule)->day }}</b></p>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-outline-primary view_student"
                                                        type="button" data-id="{{ $clase->id }}">Ver</button>
                                                    <button class="btn btn-sm btn-outline-primary edit_student"
                                                        type="button" data-id="{{ $clase->id }}">Editar</button>
                                                    <button class="btn btn-sm btn-outline-danger delete_student"
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
