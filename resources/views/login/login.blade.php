<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('comunes.header')
    <style>
        body {
            width: 100%;
            height: calc(100%);
            /*background: #007bff;*/
        }

        main#main {
            width: 100%;
            height: calc(100%);
            background: white;
        }

        #login-right {
            position: absolute;
            right: 0;
            width: 40%;
            height: calc(100%);
            background: white;
            display: flex;
            align-items: center;
        }

        #login-left {
            position: absolute;
            left: 0;
            width: 60%;
            height: calc(100%);
            background: #59b6ec61;
            display: flex;
            align-items: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        #login-right .card {
            margin: auto;
            z-index: 1
        }

        .logo {
            margin: auto;
            font-size: 8rem;
            background: white;
            padding: .5em 0.7em;
            border-radius: 50% 50%;
            color: #000000b3;
            z-index: 10;
        }

        div#login-right::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: calc(100%);
            height: calc(100%);
            background: #000000e0;
        }

    </style>

</head>

<body>

    <main id="main" class=" bg-dark">
        <div id="login-left">
        </div>

        <div id="login-right">
            <div class="card col-md-8">
                <div class="card-body">

                    <form id="login-form">
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
