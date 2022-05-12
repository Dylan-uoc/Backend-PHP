<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Cursos;
use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Http\Request;

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

    public function cursos(){

        $cursos = Cursos::all();
        return view('admin.cursos.index')->with('cursos', $cursos);
    }

    public function profesores(){
        $profesores = Profesor::all();
        return view('admin.profesores.index')->with('profesores', $profesores);
    }

    public function estudiantes(){
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index')->with('estudiantes', $estudiantes);
    }

    public function clases(){
        $clases = Clase::all();
        return view('admin.clases.index')->with('clases', $clases);
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
