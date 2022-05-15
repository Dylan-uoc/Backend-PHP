<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Clase;
use App\Models\Cursos;
use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Http\Request;
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
        return view('admin.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cursos()
    {

        $cursos = Cursos::all();
        return view('admin.cursos.index')->with('cursos', $cursos);
    }

    public function profesores()
    {
        $profesores = Profesor::all();
        return view('admin.profesores.index')->with('profesores', $profesores);
    }

    public function estudiantes()
    {
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index')->with('estudiantes', $estudiantes);
    }

    public function clases()
    {
        $clases = Clase::all();
        $cursos = Cursos::all();
        $profesores = Profesor::all();
        $horarios = Calendario::all();
        return view('admin.clases.index')->with('clases', $clases)->with('cursos', $cursos)->with('profesores', $profesores)->with('horarios', $horarios);
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
        $curso->save();

        return back()->with('success', 'Curso creado correctamente!');
    }

    public function guardarClases(Request $request){
        $clase = new Clase();
        $clase->name = $request->input('name');
        $clase->color = $request->input('color');
        $clase->id_teacher = $request->input('id_teacher');
        $clase->id_course = $request->input('id_course');
        $clase->id_schedule = $request->input('id_schedule');
        $clase->save();

        return back()->with('success', 'Clase creada correctamente!');
    }

    public function editarClases($id){
        $clase = Clase::find($id);
        $cursos = Cursos::all();
        $profesores = Profesor::all();
        $horarios = Calendario::all();
        return view('admin.clases.editar')->with('clase', $clase)->with('cursos', $cursos)->with('profesores', $profesores)->with('horarios', $horarios);
    }

    public function editarClasesFormulario(Request $request, $id){
        $clase = Clase::find($id);
        $clase->name = $request->input('name');
        $clase->color = $request->input('color');
        $clase->id_teacher = $request->input('id_teacher');
        $clase->id_course = $request->input('id_course');
        $clase->id_schedule = $request->input('id_schedule');
        $clase->save();

        return redirect()->route('clases')->with('success', 'Clase editada correctamente!');
    }

    public function eliminarClases($id){
        $clase = Clase::find($id);
        $clase->delete();

        return redirect()->route('clases')->with('success', 'Clase eliminada correctamente!');
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
        $estudiante->save();

        return back()->with('success', 'Estudiante creado correctamente!');
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

        return back()->with('success', 'Profesor creado correctamente!');
    }

    public function editarProfesores($id){
        $profesor = Profesor::find($id);
        return view('admin.profesores.editar')->with('profesor', $profesor);
    }

    public function editarProfesoresFormulario(Request $request, $id){
        $profesor = Profesor::find($id);
        $profesor->name = $request->input('name');
        $profesor->surname = $request->input('surname');
        $profesor->email = $request->input('email');
        $profesor->telephone = $request->input('telephone');
        $profesor->nif = $request->input('nif');
        $profesor->save();

        return redirect()->route('profesores')->with('success', 'Profesor editado correctamente!');
    }

    public function eliminarProfesores($id){
        $profesor = Profesor::find($id);
        $profesor->delete();

        return redirect()->route('profesores')->with('success', 'Profesor eliminado correctamente!');
    }

    public function editarCursos(Request $request, $id){
        $curso = Cursos::find($id);
        $curso->name = $request->input('name');
        $curso->description = $request->input('description');
        $curso->date_start = $request->input('date_start');
        $curso->date_end = $request->input('date_end');
        $curso->save();

        return back()->with('success', 'Curso editado correctamente!');
    }

    public function eliminarCursos($id){
        $curso = Cursos::find($id);
        $curso->delete();

        return back()->with('success', 'Curso eliminado correctamente!');
    }

    public function editarEstudiantes ($id){
        $estudiante = Estudiante::find($id);
        return view('admin.estudiantes.editar')->with('estudiante', $estudiante);
    }

    public function editarEstudiantesFormulario(Request $request, $id){
        $estudiante = Estudiante::find($id);
        $estudiante->name = $request->input('name');
        $estudiante->surname = $request->input('surname');
        $estudiante->email = $request->input('email');
        $estudiante->telephone = $request->input('telephone');
        $estudiante->nif = $request->input('nif');
        $estudiante->username = $request->input('username');
        $estudiante->date_registered = $request->input('date_registered');
        $estudiante->save();

        return back()->with('success', 'Estudiante editado correctamente!');
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
}
