<nav id="sidebar" class='mx-lt-5 bg-dark'>

    <div class="sidebar-list">
        <a href="/panel/estudiantes" class="nav-item nav-home {!! Route::is('admin') ? 'active' : '' !!}"><span class='icon-field'><i
                    class="fa fa-home"></i></span> Inicio</a>
        <a href="/panel/estudiantes/cursos" class="nav-item nav-courses {!! Route::is('cursosEstudiante') ? 'active' : '' !!}"><span
                class='icon-field'><i class="fa fa-list"></i></span> Cursos</a>
        <a href="/panel/estudiantes/clases" class="nav-item nav-subjects  {!! Route::is('clasesEstudiante') ? 'active' : '' !!}"><span
                class='icon-field'><i class="fa fa-book"></i></span> Clases</a>
        <a href="/panel/estudiantes/examenes" class="nav-item nav-faculty  {!! Route::is('examenesEstudiante') ? 'active' : '' !!}"><span
                class='icon-field'><i class="fa fa-user-tie"></i></span> Exámenes</a>
        <a href="/panel/estudiantes/trabajos" class="nav-item nav-faculty  {!! Route::is('trabajosEstudiante') ? 'active' : '' !!}"><span
                class='icon-field'><i class="fa fa-cogs"></i></span> Trabajos</a>
        <a href="/panel/estudiantes/calendario" class="nav-item nav-schedule"><span class='icon-field'><i
                    class="fa fa-calendar-day"></i></span> Calendario</a>
    </div>

</nav>
