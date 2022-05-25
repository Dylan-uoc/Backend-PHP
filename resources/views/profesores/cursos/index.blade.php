@extends('profesores.comunes.base')
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
                            <div class="col-md-12">
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
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
