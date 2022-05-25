<@extends('estudiantes.comunes.base');
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

                                <table class="table table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="">Nombre Clase</th>
                                            <th class="">Nombre Trabajo</th>
                                            <th class="">Nota Trabajo</th>
                                            <th class="">Fecha Trabajo</th>
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
                                                    <p><b>{{ $trabajo->nombreTrabajo}}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ $trabajo->notaTrabajo }}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ date("d/m/Y", strtotime($trabajo->fechaTrabajo)) }}</b>
                                                    </p>
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
