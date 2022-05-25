<nav id="sidebar" class='mx-lt-5 bg-dark'>

    <div class="sidebar-list">
        <a href="/admin" class="nav-item nav-home {!! (Route::is('admin') ? 'active' : '') !!}"><span class='icon-field'><i
                    class="fa fa-home"></i></span> Inicio</a>
        <a href="/admin/cursos" class="nav-item nav-courses {!! (Route::is('cursos') ? 'active' : '') !!}"><span class='icon-field'><i
                    class="fa fa-list"></i></span> Lista de cursos</a>
        <a href="/admin/clases" class="nav-item nav-subjects  {!! (Route::is('clases') ? 'active' : '') !!}"><span class='icon-field'><i
                    class="fa fa-book"></i></span> Lista de clases</a>
        <a href="/admin/profesores" class="nav-item nav-faculty  {!! (Route::is('profesores') ? 'active' : '') !!}"><span class='icon-field'><i
                    class="fa fa-user-tie"></i></span> Lista de profesores</a>
                    <a href="/admin/estudiantes" class="nav-item nav-faculty  {!! (Route::is('estudiantes') ? 'active' : '') !!}"><span class='icon-field'><i
                                class="fa fa-user"></i></span> Lista de estudiantes</a>
        <a href="/admin/calendario" class="nav-item nav-schedule"><span class='icon-field'><i
                    class="fa fa-calendar-day"></i></span> Schedule</a>
    </div>

</nav>
