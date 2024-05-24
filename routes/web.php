<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EspetaculoController;

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

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cursos', CursoController::class);
Route::resource('turmas', TurmaController::class);
Route::resource('alunos', AlunoController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('disciplinas', DisciplinaController::class);
Route::resource('espetaculos', EspetaculoController::class);