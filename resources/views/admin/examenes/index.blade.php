@extends('admin.comunes.base');
@section('titulo')
    Exámenes
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
                                <b>Lista Exámenes de la clase: {{ $clase->name }}</b>
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
                                            <th class="">Estudiante</th>
                                            <th class="">Nombre</th>
                                            <th class="">Nota</th>
                                            <th class="">Fecha</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($examenes as $examen)
                                            <tr>
                                                <td class="text-center">{{ $examen->id }}</td>
                                                <td class="">
                                                    <p><b>{{ App\Models\Estudiante::find($examen->id_student)->name }} {{ App\Models\Estudiante::find($examen->id_student)->surname }}</b></p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ $examen->name }}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ $examen->mark }}</b>
                                                    </p>
                                                </td>
                                                <td class="">
                                                    <p><b>{{ date("d/m/Y", strtotime($examen->fecha)) }}</b>
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-outline-primary"
                                                        href="/admin/clases/editar/{{ $examen->id }}">Editar</a>
                                                    <button class="btn btn-sm btn-outline-danger eliminar_clase"
                                                        type="button" data-id="{{ $examen->id }}">Borrar</button>                                                   
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
