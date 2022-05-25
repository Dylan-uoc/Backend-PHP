<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Cursos;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PanelEstudianteController extends Controller
{    
    public function inicioPanelEstudiantes(){
        $usuario = Session::get('usuario');
        return view('estudiantes.index')->with('usuario',$usuario);
    }

    public function cursosEstudiante(){

        $usuario = Session::get('usuario');

        $cursos_no_inscritos = DB::select('SELECT courses.* FROM courses
        WHERE courses.id NOT IN (SELECT id_course FROM enrollment WHERE enrollment.id_student = ?)',[$usuario->id]);
        
        $inscripciones = Inscripcion::where('id_student','=',$usuario->id)->get();

        return view('estudiantes.cursos.index')->with('inscripciones',$inscripciones)->with('cursos_no_inscritos',$cursos_no_inscritos)->with('usuario',$usuario);
    }

    public function inscribirseCurso(Request $request, $id_curso,$id_usuario){
        $inscripcion = new Inscripcion();
        $inscripcion->id_student = $id_usuario;
        $inscripcion->id_course = $id_curso;
        $inscripcion->status = 1;
        $inscripcion->save();
        return back()->with('success', 'Inscrito al curso !!!');
    }

    public function clasesEstudiante(){
        $usuario = Session::get('usuario');
        
        $clases = DB::select('SELECT class.id as idClase,teachers.name as nombreProfesor, teachers.surname as apellidoProfesor, courses.name as nombreCurso, class.name as nombreClase, schedule.day as fechaClase
        FROM class
        INNER JOIN teachers ON teachers.id = class.id_teacher
        INNER JOIN schedule ON schedule.id = class.id_schedule
        INNER JOIN courses ON courses.id = class.id_course
        INNER JOIN enrollment ON enrollment.id_course = courses.id
        WHERE enrollment.id_student = ?',[$usuario->id]);

        return view('estudiantes.clases.index')->with('clases',$clases)->with('usuario',$usuario);
    }

    public function examenesEstudiante(){
        $usuario = Session::get('usuario');

        $examenes = DB::select('SELECT exams.id as idExamen, class.name as nombreClase, exams.name as nombreExamen, exams.mark as notaExamen, exams.fecha as fechaExamen 
        FROM `exams`
        INNER JOIN class ON class.id = exams.id_class
        WHERE exams.id_student = ?',[$usuario->id]);

        return view('estudiantes.examenes.index')->with('examenes',$examenes)->with('usuario',$usuario);
    }

    public function trabajosEstudiante(){
        $usuario = Session::get('usuario');
        
        $trabajos = DB::select('SELECT works.id as idTrabajo, class.name as nombreClase, works.name as nombreTrabajo, works.mark as notaTrabajo, works.fecha as fechaTrabajo
        FROM `works`
        INNER JOIN class ON class.id = works.id_class
        WHERE works.id_student  = ?',[$usuario->id]);
        
        return view('estudiantes.trabajos.index')->with('trabajos',$trabajos)->with('usuario',$usuario);
    }

}
