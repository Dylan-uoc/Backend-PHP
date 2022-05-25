<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cursos;
use App\Models\Examen;
use App\Models\Trabajo;
use Illuminate\Support\Facades\DB;

class PanelProfesorController extends Controller
{
    public function inicioPanelProfesor(){
        $usuario = Session::get('usuario');
        return view('profesores.index')->with('usuario',$usuario);
    }

    public function cursosProfesor(){
        $usuario = Session::get('usuario');
        $cursos = Cursos::all();
        return view('profesores.cursos.index')->with('cursos', $cursos)->with('usuario',$usuario);
    }

    public function clasesProfesor(){
        $usuario = Session::get('usuario');
        $clases = Clase::where('id_teacher','=',$usuario->id)->get();
        return view('profesores.clases.index')->with('clases', $clases)->with('usuario',$usuario);
    }

    public function examenesProfesor(){
        $usuario = Session::get('usuario');
        $examenes = DB::select('SELECT exams.id as idExamen, class.name as nombreClase, students.name as nombreEstudiante, students.surname as apellidosEstudiante, exams.name as nombreExamen, exams.mark as notaExamen, exams.fecha as fechaExamen
        FROM `exams`
        INNER JOIN class ON class.id = exams.id_class
        INNER JOIN teachers ON teachers.id = class.id_teacher
        INNER JOIN students ON students.id = exams.id_student
        WHERE class.id_teacher = ?',[$usuario->id]);
        return view('profesores.examenes.index')->with('examenes', $examenes)->with('usuario',$usuario);
    }

    public function modificarNota(Request $request){
        $id_examen = $request->input('id_examen');
        $nota_nueva = $request->input('nota_nueva');

        $examen = Examen::find($id_examen);
        $examen->mark = $nota_nueva;
        $examen->save();

        return redirect()->route('examenesProfesor')->with('success','Nota modificada correctamente');
    }

    public function trabajosProfesor(){
        $usuario = Session::get('usuario');
        $trabajos = DB::select('SELECT works.id as idTrabajo, class.name as nombreClase, students.name as nombreEstudiante, students.surname as apellidosEstudiante, works.name as nombreTrabajo, works.mark as notaTrabajo, works.fecha as fechaTrabajo
        FROM `works`
        INNER JOIN class ON class.id = works.id_class
        INNER JOIN teachers ON teachers.id = class.id_teacher
        INNER JOIN students ON students.id = works.id_student
        WHERE class.id_teacher = ?',[$usuario->id]);
        return view('profesores.trabajos.index')->with('trabajos', $trabajos)->with('usuario',$usuario);
    }

    public function modificarNotaTrabajo(Request $request){
        $id_trabajo = $request->input('id_trabajo');
        $nota_nueva = $request->input('nota_nueva');

        $trabajo = Trabajo::find($id_trabajo);
        $trabajo->mark = $nota_nueva;
        $trabajo->save();

        return redirect()->route('trabajosProfesor')->with('success','Nota modificada correctamente');
    }


    
}
