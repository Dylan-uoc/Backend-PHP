@extends('admin.comunes.base');
@section('titulo')
    Calendario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="eventosModal" tabindex="-1" role="dialog" aria-labelledby="eventosModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventosModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="tipo"></h4>
                    <h5 class="nombre_tipo"></h5>
                    <h5 class="fecha_tipo"></h5>
                    <h5 class=nombre_estudiante"></h5>
                    <h5 class="nota"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="clasesModal" tabindex="-1" role="dialog" aria-labelledby="clasesModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clasesModalLabel">Clases</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="nombre_curso"></h4>
                    <h5 class="profesor_clase"></h5>
                    <h5 class="nombre_clase"></h5>
                    <h5 class="fecha_clase"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var calendarEl = document.getElementById('calendar');
        var calendar;

        document.addEventListener('DOMContentLoaded', function() {

            calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: '{{ date('Y-m-d') }}',
                weekNumbers: true,
                navLinks: true,
                editable: false,
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true,
                events: <?php echo json_encode($examenes); ?>,
                eventClick: function(info) {

                    let tipo = info.event.extendedProps['tipo'];
                    let id_evento = info.event._def.publicId

                    switch (tipo) {
                        case "examen":
                            start_load();
                            $.ajax({
                                type: "GET",
                                url: "/admin/examenes/info/" + id_evento,
                                data: {
                                    id: id_evento
                                },
                                success: function(data) {
                                    let examen = JSON.parse(data);
                                    $('#eventosModal .modal-title').html("Examen");
                                    $('#eventosModal .tipo').html("Clase: " + examen[0]
                                        .nombreClase);
                                    $('#eventosModal .nombre_tipo').html("Examen: " +
                                        examen[0].nombreExamen);
                                    $('#eventosModal .fecha_tipo').html("Fecha: " + examen[
                                        0].fechaExamen);
                                    $('#eventosModal .estudiante').html("Alumno: " + examen[
                                            0].nombreEstudiante + " " + examen[0]
                                        .apellidosEstudiante);
                                    $('#eventosModal .nota').html("Nota: " + examen[0]
                                        .notaExamen);
                                    $('#eventosModal').modal('show');
                                    end_load();
                                }
                            });

                            break;

                        case "trabajo":
                            start_load();
                            $.ajax({
                                type: "GET",
                                url: "/admin/trabajos/info/" + id_evento,
                                data: {
                                    id: id_evento
                                },
                                success: function(data) {
                                    let trabajo = JSON.parse(data);
                                    $('#eventosModal .modal-title').html("Trabajo");
                                    $('#eventosModal .tipo').html("Clase: " + trabajo[0]
                                        .nombreClase);
                                    $('#eventosModal .nombre_tipo').html("Trabajo: " +
                                        trabajo[0].nombreTrabajo);
                                    $('#eventosModal .fecha_tipo').html("Fecha: " + trabajo[
                                        0].fechaTrabajo);
                                    $('#eventosModal .estudiante').html("Alumno: " +
                                        trabajo[0].nombreEstudiante + " " + trabajo[0]
                                        .apellidosEstudiante);
                                    $('#eventosModal .nota').html("Nota: " + trabajo[0]
                                        .notaTrabajo);
                                    $('#eventosModal').modal('show');
                                    end_load();
                                }
                            });
                            break;

                        case "clase":
                            start_load();
                            $.ajax({
                                type: "GET",
                                url: "/admin/clases/info/" + id_evento,
                                data: {
                                    id: id_evento
                                },
                                success: function(data) {
                                    let curso = JSON.parse(data);
                                    $('#clasesModal .nombre_curso').html("Curso: " + curso[
                                            0]
                                        .nombreCurso);
                                    $('#clasesModal .profesor_clase').html("Profesor: " +
                                        curso[0].nombreProfesor + " " + curso[0]
                                        .apellidosProfesor);
                                    $('#clasesModal .nombre_clase').html("Clase: " + curso[
                                        0].nombreClase);
                                    $('#clasesModal .fecha_clase').html("Fecha: " + curso[0]
                                        .fechaClase);
                                    $('#clasesModal').modal('show');
                                    end_load();
                                }
                            });
                            break;
                    }

                }
            });
            calendar.render();

        });
    </script>
@endsection
