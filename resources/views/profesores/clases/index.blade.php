@extends('profesores.comunes.base');
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
                                            <th class="">Curso</th>
                                            <th class="">Clase</th>
                                            <th class="">Fecha Clase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clases as $clase)
                                            <tr>
                                                <td class="text-center">{{ $clase->id }}</td>                                            
                                                <td class="">
                                                    <p><b>{{ App\Models\Cursos::find($clase->id_course)->name }}</b></p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ $clase->name }}</b></p>
                                                </td>
                                                <td class="text-right">
                                                    <p><b>{{ App\Models\Calendario::find($clase->id_schedule)->day }}</b></p>
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
