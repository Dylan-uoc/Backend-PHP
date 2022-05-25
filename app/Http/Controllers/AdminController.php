<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Clase;
use App\Models\Cursos;
use App\Models\Estudiante;
use App\Models\Examen;
use App\Models\Profesor;
use App\Models\Trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Session::get('usuario');
        return view('admin.index')->with('usuario',$admin);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cursos()
    {
        $cursos = Cursos::all();
        $usuario = Session::get('usuario');
        return view('admin.cursos.index')->with('cursos', $cursos)->with('usuario',$usuario);
    }

    public function profesores()
    {
        $profesores = Profesor::all();
        $usuario = Session::get('usuario');
        return view('admin.profesores.index')->with('profesores', $profesores)->with('usuario',$usuario);
    }

    public function estudiantes()
    {
        $estudiantes = Estudiante::all();
        $usuario = Session::get('usuario');
        return view('admin.estudiantes.index')->with('estudiantes', $estudiantes)->with('usuario',$usuario);
    }

    public function clases()
    {
        $clases = Clase::all();
        $cursos = Cursos::all();
        $profesores = Profesor::all();
        $horarios = Calendario::all();
        $usuario = Session::get('usuario');
        return view('admin.clases.index')->with('clases', $clases)->with('cursos', $cursos)->with('profesores', $profesores)->with('horarios', $horarios)->with('usuario',$usuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarCursos(Request $request)
    {
        $curso = new Cursos();
        $curso->name = $request->input('name');
        $curso->description = $request->input('description');
        $curso->date_start = $request->input('date_start');
        $curso->date_end = $request->input('date_end');
        $curso->active = 1;
        $usuario = Session::get('usuario');
        $curso->save();

        return back()->with('success', 'Curso creado correctamente!')->with('usuario',$usuario);
    }

    public function guardarClases(Request $request){
        $clase = new Clase();
        $clase->name = $request->input('name');
        $clase->color = $request->input('color');
        $clase->id_teacher = $request->input('id_teacher');
        $clase->id_course = $request->input('id_course');
        $clase->id_schedule = $request->input('id_schedule');
        $usuario = Session::get('usuario');
        $clase->save();

        return back()->with('success', 'Clase creada correctamente!')->with('usuario',$usuario);
    }

    public function editarClases($id){
        $clase = Clase::find($id);
        $cursos = Cursos::all();
        $profesores = Profesor::all();
        $horarios = Calendario::all();
        $usuario = Session::get('usuario');
        return view('admin.clases.editar')->with('clase', $clase)->with('cursos', $cursos)->with('profesores', $profesores)->with('horarios', $horarios)->with('usuario',$usuario);
    }

    public function editarClasesFormulario(Request $request, $id){
        $clase = Clase::find($id);
        $clase->name = $request->input('name');
        $clase->color = $request->input('color');
        $clase->id_teacher = $request->input('id_teacher');
        $clase->id_course = $request->input('id_course');
        $clase->id_schedule = $request->input('id_schedule');
        $usuario = Session::get('usuario');
        $clase->save();

        return redirect()->route('clases')->with('success', 'Clase editada correctamente!')->with('usuario',$usuario);
    }

    public function eliminarClases($id){
        $clase = Clase::find($id);
        $clase->delete();
        $usuario = Session::get('usuario');

        return redirect()->route('clases')->with('success', 'Clase eliminada correctamente!')->with('usuario',$usuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarEstudiantes(Request $request){
        $estudiante = new Estudiante();
        $estudiante->name = $request->input('name');
        $estudiante->surname = $request->input('surname');
        $estudiante->email = $request->input('email');
        $estudiante->telephone = $request->input('telephone');
        $estudiante->nif = $request->input('nif');
        $estudiante->username = $request->input('username');
        $estudiante->pass = $request->input('pass');
        $estudiante->date_registered = $request->input('date_registered');
        $usuario = Session::get('usuario');
        $estudiante->save();

        return back()->with('success', 'Estudiante creado correctamente!')->with('usuario',$usuario);
    }

    public function editarEstudianteFormulario(Request $request,$id){
        $estudiante = Estudiante::find($id);
        $estudiante->name = $request->input('name');
        $estudiante->surname = $request->input('surname');
        $estudiante->email = $request->input('email');
        $estudiante->telephone = $request->input('telephone');
        $estudiante->nif = $request->input('nif');
        $estudiante->username = $request->input('username');
        $estudiante->pass = $request->input('pass');
        $estudiante->date_registered = $request->input('date_registered');
        $estudiante->save();
        $usuario = Session::get('usuario');

        return redirect()->route('estudiantes')->with('success', 'Estudiante editado correctamente!')->with('usuario',$usuario);
    }

    public function eliminarEstudiantes($id){
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        $usuario = Session::get('usuario');
        return redirect()->route('estudiantes')->with('success', 'Estudiante eliminado correctamente!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarProfesores(Request $request)
    {
        $profesor = new Profesor();
        $profesor->name = $request->input('name');
        $profesor->surname = $request->input('surname');
        $profesor->email = $request->input('email');
        $profesor->telephone = $request->input('telephone');
        $profesor->nif = $request->input('nif');
        $profesor->save();
        $usuario = Session::get('usuario');

        return back()->with('success', 'Profesor creado correctamente!')->with('usuario',$usuario);
    }

    public function editarProfesores($id){
        $profesor = Profesor::find($id);
        $usuario = Session::get('usuario');
        return view('admin.profesores.editar')->with('profesor', $profesor)->with('usuario',$usuario);
    }

    public function editarEstudiantes($id){
        $estudiante = Estudiante::find($id);
        $usuario = Session::get('usuario');
        return view('admin.estudiantes.editar')->with('estudiante', $estudiante)->with('usuario',$usuario);
    }

    public function editarProfesoresFormulario(Request $request, $id){
        $profesor = Profesor::find($id);
        $profesor->name = $request->input('name');
        $profesor->surname = $request->input('surname');
        $profesor->email = $request->input('email');
        $profesor->telephone = $request->input('telephone');
        $profesor->nif = $request->input('nif');
        $profesor->save();
        $usuario = Session::get('usuario');

        return redirect()->route('profesores')->with('success', 'Profesor editado correctamente!')->with('usuario',$usuario);
    }

    public function eliminarProfesores($id){
        $profesor = Profesor::find($id);
        $profesor->delete();
        $usuario = Session::get('usuario');

        return redirect()->route('profesores')->with('success', 'Profesor eliminado correctamente!');
    }

    public function editarCursos(Request $request, $id){
        $curso = Cursos::find($id);
        $curso->name = $request->input('name');
        $curso->description = $request->input('description');
        $curso->date_start = $request->input('date_start');
        $curso->date_end = $request->input('date_end');
        $curso->save();
        $usuario = Session::get('usuario');

        return back()->with('success', 'Curso editado correctamente!')->with('usuario',$usuario);
    }

    public function eliminarCursos($id){
        $curso = Cursos::find($id);
        $curso->delete();
        $usuario = Session::get('usuario');

        return back()->with('success', 'Curso eliminado correctamente!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function examenes($id){
        $examenes = Examen::where('id_class','=',$id)->get();
        $clase = Clase::find($id);
        $usuario = Session::get('usuario');
        return view('admin.examenes.index')->with('examenes',$examenes)->with('clase',$clase)->with('usuario',$usuario);
    }

    public function trabajos($id){
        $trabajos = Trabajo::where('id_class','=',$id)->get();
        $clase = Clase::find($id);
        $usuario = Session::get('usuario');
        return view('admin.trabajos.index')->with('trabajos',$trabajos)->with('clase',$clase)->with('usuario',$usuario);
    }

    public function calendario(){
        $examenes = Examen::all();
        $trabajos = Trabajo::all();
        $clases = Clase::all();
        $usuario = Session::get('usuario');

        $events = array();

        foreach($examenes as $examen){
            $events[] = array("id"=>$examen->id,"tipo"=>"examen","color"=>"blue","title"=>$examen->name, "start"=>date("Y-m-d",strtotime($examen->fecha)));
        }

        foreach($trabajos as $trabajo){
            $events[] = array("id"=>$trabajo->id,"tipo"=>"trabajo","color"=>"green","title"=>$trabajo->name, "start"=>date("Y-m-d",strtotime($trabajo->fecha)));
        }

        foreach($clases as $clase){
            $fecha = Calendario::find($clase->id_schedule)->day;
            $events[] = array("id"=>$clase->id,"tipo"=>"clase","color"=>$clase->color,"title"=>$clase->name, "start"=>date("Y-m-d",strtotime($fecha)));
        }


        $examen = DB::select('SELECT class.name as nombreClase, students.name as nombreEstudiante, students.surname as apellidosEstudiante, exams.name as nombreExamen, exams.mark as notaExamen, exams.fecha as fechaExamen FROM `exams`
        INNER JOIN class ON class.id = exams.id_class
        INNER JOIN students ON students.id = exams.id_student
        WHERE exams.id = ?', [3]);

        return view('admin.calendario.index')->with('examenes',$events)->with('usuario',$usuario);
    }

    public function informacionExamenes($id){

        $examen = DB::select('SELECT class.name as nombreClase, students.name as nombreEstudiante, students.surname as apellidosEstudiante, exams.name as nombreExamen, exams.mark as notaExamen, exams.fecha as fechaExamen FROM `exams`
        INNER JOIN class ON class.id = exams.id_class
        INNER JOIN students ON students.id = exams.id_student
        WHERE exams.id = ?', [$id]);
        $examen = json_encode($examen);
        echo $examen;
        $usuario = Session::get('usuario');
    }

    public function informacionTrabajos($id){
        $work = DB::select('SELECT class.name as nombreClase, students.name as nombreEstudiante, students.surname as apellidosEstudiante, works.name as nombreTrabajo, works.mark as notaTrabajo, works.fecha as fechaTrabajo FROM `works`
        INNER JOIN class ON class.id = works.id_class
        INNER JOIN students ON students.id = works.id_student
        WHERE works.id = ?', [$id]);
        $work = json_encode($work);
        echo $work;
        $usuario = Session::get('usuario');
    }

    public function informacionClase($id){
        $clase = DB::select('SELECT teachers.name as nombreProfesor, teachers.surname as apellidosProfesor, courses.name as nombreCurso, schedule.day as fechaClase,
        class.name as nombreClase
        FROM class
        INNER JOIN teachers ON teachers.id = class.id_teacher
        INNER JOIN courses ON courses.id = class.id_course
        INNER JOIN schedule ON schedule.id = class.id_schedule
        WHERE class.id = ?',[$id]);
        $clase = json_encode($clase);
        echo $clase;
        $usuario = Session::get('usuario');
    }

}
