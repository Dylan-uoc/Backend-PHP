<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | @yield('titulo')</title>

    @include('comunes.header')
    <style>
        body {
            background: #80808045;
        }

        .modal-dialog.large {
            width: 80% !important;
            max-width: unset;
        }

        .modal-dialog.mid-large {
            width: 50% !important;
            max-width: unset;
        }

        #viewer_modal .btn-close {
            position: absolute;
            z-index: 999999;
            /*right: -4.5em;*/
            background: unset;
            color: white;
            border: unset;
            font-size: 27px;
            top: 0;
        }

        #viewer_modal .modal-dialog {
            width: 80%;
            max-width: unset;
            height: calc(90%);
            max-height: unset;
        }

        #viewer_modal .modal-content {
            background: black;
            border: unset;
            height: calc(100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #viewer_modal img,
        #viewer_modal video {
            max-height: calc(100%);
            max-width: calc(100%);
        }

        <style>.collapse a {
            text-indent: 10px;
        }

        .logo {
            margin: auto;
            font-size: 20px;
            background: white;
            padding: 7px 11px;
            border-radius: 50% 50%;
            color: #000000b3;
        }

    </style>
</head>

<body>
    @include('admin.comunes.top-menu')
    @include('admin.comunes.menu')

    <main id="view-panel">
        @yield('content')
    </main>


    @yield('scripts')


    <script>
        window.start_load = function() {
            $('body').prepend('<di id="preloader2"></di>')
        }
        window.end_load = function() {
            $('#preloader2').fadeOut('fast', function() {
                $(this).remove();
            })
        }
    </script>

</body>

</html>
