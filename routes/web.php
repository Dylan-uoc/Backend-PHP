<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
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



