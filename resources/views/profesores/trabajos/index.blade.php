@extends('profesores.comunes.base');
@section('titulo')
    Trabajos
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
                                <b>Lista Trabajos de la clase</b>
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
                                            <th class="">Nombre Clase</th>
                                            <th class="">Nombre Estudiante</th>
                                            <th class="">Nombre Trabajo</th>
                                            <th class="">Nota Trabajo</th>
                                            <th class="">Fecha Trabajo</th>
                                            <th class="">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trabajos as $trabajo)
                                            <tr>
                                                <td class="text-center">{{ $trabajo->idTrabajo }}</td>
                                                <td class="">
                                                    <p><b>{{ $trabajo->nombreClase }}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ $trabajo->nombreEstudiante }}
                                                            {{ $trabajo->apellidosEstudiante }}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p class="nombreTrabajo"><b>{{ $trabajo->nombreTrabajo }}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ $trabajo->notaTrabajo }}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ date('d/m/Y', strtotime($trabajo->fechaTrabajo)) }}</b>
                                                    </p>
                                                </td>
                                                <td>
                                                    <a data-nombre="{{ $trabajo->nombreTrabajo }}"
                                                        data-id="{{ $trabajo->idTrabajo }}"
                                                        class="btn btn-primary btn-modificarNota text-white">Modificar
                                                        nota</a>
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

    <div class="modal fade" id="trabajosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/panel/profesores/trabajos/nota" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="id_trabajo" value="" class="id_trabajo" />
                                <input type="text" class="form-control" placeholder="Entre la nueva nota"
                                    name="nota_nueva">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Modificar</button>
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

            $('.btn-modificarNota').click(function() {
                let idTrabajo = $(this).attr('data-id');
                let nombreTrabajo = $(this).attr('data-nombre');
                $('.modal-title').html("Editar Nota del trabajo: " + nombreTrabajo);
                $('.id_trabajo').val(idTrabajo);
                $('#trabajosModal').modal('show');
            });

        });
    </script>
@endsection
