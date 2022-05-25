<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanelEstudianteController;
use App\Http\Controllers\PanelProfesorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/login',
    [LoginController::class, 'index']
)->name('login');

Route::get(
    '/logout',
    [LoginController::class, 'logout']
)->name('logout');

Route::post(
    '/verificar/usuario',
    [LoginController::class, 'verificarUsuario']
)->name('verificarUsuario');

Route::get(
    '/admin',
    [AdminController::class, 'index']
)->name('admin');

Route::get(
    '/admin/cursos',
    [AdminController::class, 'cursos']
)->name('cursos');

Route::post(
    '/admin/cursos/editar/{id}',
    [AdminController::class, 'editarCursos']
)->name('editarCursos');

Route::post(
    '/admin/cursos/eliminar/{id}',
    [AdminController::class, 'eliminarCursos']
)->name('eliminarCursos');

Route::get(
    '/admin/profesores',
    [AdminController::class, 'profesores']
)->name('profesores');

Route::get(
    '/admin/estudiantes',
    [AdminController::class, 'estudiantes']
)->name('estudiantes');

Route::post(
    '/admin/estudiantes/eliminar/{id}',
    [AdminController::class, 'eliminarEstudiantes']
)->name('eliminarEstudiantes');

Route::get(
    '/admin/clases',
    [AdminController::class, 'clases']
)->name('clases');

Route::get(
    '/admin/clases/editar/{id}',
    [AdminController::class, 'editarClases']
)->name('editarClases');

Route::post(
    '/admin/clases/{id}/editar',
    [AdminController::class, 'editarClasesFormulario']
)->name('editarClasesFormulario');

Route::post(
    '/admin/clases/eliminar/{id}',
    [AdminController::class, 'eliminarClases']
)->name('eliminarClases');

Route::get(
    '/admin/clases/{id}/examenes',
    [AdminController::class, 'examenes']
)->name('examenes');

Route::get(
    '/admin/clases/{id}/trabajos',
    [AdminController::class, 'trabajos']
)->name('trabajos');

Route::post(
    '/admin/cursos/guardar',
    [AdminController::class, 'guardarCursos']
)->name('guardarCursos');

Route::post(
    '/admin/profesores/guardar',
    [AdminController::class, 'guardarProfesores']
)->name('guardarProfesores');

Route::get(
    '/admin/profesores/editar/{id}',
    [AdminController::class, 'editarProfesores']
)->name('editarProfesores');

Route::post(
    '/admin/profesores/{id}/editar',
    [AdminController::class, 'editarProfesoresFormulario']
)->name('editarProfesoresFormulario');

Route::post(
    '/admin/profesores/eliminar/{id}',
    [AdminController::class, 'eliminarProfesores']
)->name('eliminarProfesores');

Route::post(
    '/admin/clases/guardar',
    [AdminController::class, 'guardarClases']
)->name('guardarClases');

Route::post(
    '/admin/estudiantes/guardar',
    [AdminController::class, 'guardarEstudiantes']
)->name('guardarEstudiantes');

Route::get(
    '/admin/estudiantes/{id}/editar',
    [AdminController::class, 'editarEstudiantes']
)->name('editarEstudiantes');

Route::post(
    '/admin/estudiantes/editar/{id}',
    [AdminController::class, 'editarEstudianteFormulario']
)->name('editarEstudianteFormulario');

Route::get(
    '/admin/calendario',
    [AdminController::class, 'calendario']
)->name('calendario');

Route::get(
    '/admin/examenes/info/{id}',
    [AdminController::class, 'informacionExamenes']
)->name('informacionExamenes');

Route::get(
    '/admin/trabajos/info/{id}',
    [AdminController::class, 'informacionTrabajos']
)->name('informacionTrabajos');

Route::get(
    '/admin/clases/info/{id}',
    [AdminController::class, 'informacionClase']
)->name('informacionClase');

/* Panel de administración de un estudiante */

Route::get(
    '/panel/estudiantes',
    [PanelEstudianteController::class, 'inicioPanelEstudiantes']
)->name('inicioPanelEstudiantes');

Route::get(
    '/panel/estudiantes/cursos',
    [PanelEstudianteController::class, 'cursosEstudiante']
)->name('cursosEstudiante');

Route::get(
    '/panel/estudiantes/clases',
    [PanelEstudianteController::class, 'clasesEstudiante']
)->name('clasesEstudiante');

Route::get(
    '/panel/estudiantes/examenes',
    [PanelEstudianteController::class, 'examenesEstudiante']
)->name('examenesEstudiante');

Route::get(
    '/panel/estudiantes/trabajos',
    [PanelEstudianteController::class, 'trabajosEstudiante']
)->name('trabajosEstudiante');

Route::post(
    '/panel/estudiantes/cursos/{id_curso}/inscribir/{id_usuario}',
    [PanelEstudianteController::class, 'inscribirseCurso']
)->name('inscribirseCurso');


/* Panel de administración de un profesor */

Route::get(
    '/panel/profesores',
    [PanelProfesorController::class, 'inicioPanelProfesor']
)->name('inicioPanelProfesor');

Route::get(
    '/panel/profesores/cursos',
    [PanelProfesorController::class, 'cursosProfesor']
)->name('cursosProfesor');

Route::get(
    '/panel/profesores/clases',
    [PanelProfesorController::class, 'clasesProfesor']
)->name('clasesProfesor');

Route::get(
    '/panel/profesores/examenes',
    [PanelProfesorController::class, 'examenesProfesor']
)->name('examenesProfesor');

Route::get(
    '/panel/profesores/trabajos',
    [PanelProfesorController::class, 'trabajosProfesor']
)->name('trabajosProfesor');

Route::post(
    '/panel/profesores/examenes/nota',
    [PanelProfesorController::class, 'modificarNota']
)->name('modificarNota');

Route::post(
    '/panel/profesores/trabajos/nota',
    [PanelProfesorController::class, 'modificarNotaTrabajo']
)->name('modificarNotaTrabajo');
