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
