@extends('estudiantes.comunes.base')
@section('titulo')
    Panel de estudiantes
@endsection

@section('content')
    <div class="containe-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        Bienvenido Estudiante: {{ $usuario->name }} {{ $usuario->surname }} !!!
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
