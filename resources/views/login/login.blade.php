<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    @include('comunes.header')

</head>

<body>

    <main id="main" class=" bg-dark">
        <div id="login-left">
        </div>

        <div id="login-right">
            <div class="card col-md-8">
                <div class="card-body">
                    <form action="/verificar/usuario" method="POST">
                        @csrf                        
                        @if (Session::has('error'))
                            <div class="row mb-3 mt-3">
                                <div class="col-lg-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ Session::get('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif 

                        <div class="form-group">
                            <label for="tipo" class="control-label">¿Quién eres?</label>
                            <select name="tipo_usuario" id="" class="form-control">
                                <option value="students">Estudiante</option>
                                <option value="teachers">Profesor</option>
                                <option value="users_admin">Administrador</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
