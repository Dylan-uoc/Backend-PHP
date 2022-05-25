<nav id="sidebar" class='mx-lt-5 bg-dark'>

    <div class="sidebar-list">
        <a href="/panel/profesores" class="nav-item nav-home {!! Route::is('admin') ? 'active' : '' !!}"><span class='icon-field'><i
                    class="fa fa-home"></i></span> Inicio</a>
        <a href="/panel/profesores/cursos" class="nav-item nav-courses {!! Route::is('cursosProfesor') ? 'active' : '' !!}"><span
                class='icon-field'><i class="fa fa-list"></i></span> Cursos</a>
        <a href="/panel/profesores/clases" class="nav-item nav-subjects  {!! Route::is('clasesProfesor') ? 'active' : '' !!}"><span
                class='icon-field'><i class="fa fa-book"></i></span> Clases</a>
        <a href="/panel/profesores/examenes" class="nav-item nav-faculty  {!! Route::is('examenesProfesor') ? 'active' : '' !!}"><span
                class='icon-field'><i class="fa fa-user-tie"></i></span> Exámenes</a>
        <a href="/panel/profesores/trabajos" class="nav-item nav-faculty  {!! Route::is('trabajosProfesor') ? 'active' : '' !!}"><span
                class='icon-field'><i class="fa fa-cogs"></i></span> Trabajos</a>
        <a href="/panel/profesores/calendario" class="nav-item nav-schedule"><span class='icon-field'><i
                    class="fa fa-calendar-day"></i></span> Calendario</a>
    </div>

</nav>
