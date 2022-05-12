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

                                    <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button"
                                        id="new_student">
                                        <i class="fa fa-plus"></i>Nuevo</button>
                                </span>
                            </div>
                            <div class="card-body">

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
                                                    <button class="btn btn-sm btn-outline-primary view_student"
                                                        type="button" data-id="{{ $estudiante->id }}">Ver</button>
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
