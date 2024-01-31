<?php

use App\Http\Controllers\AsignacionPreviaController;
use App\Models\AsignacionPrevia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignacionAulaController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DecanaturaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\UsuarioController;
use App\Models\AsignacionAula;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('asignaciones', AsignacionPreviaController::class);


Route::get('/asignaciones', [AsignacionPreviaController::class, 'index'])->name('asignaciones.index');
Route::post('/asignaciones/store', [AsignacionPreviaController::class, 'store'])->name('asignaciones.store');

Route::post('/asignaciones/asignar-aulas/{asignacionPrevia}', [AsignacionPreviaController::class, 'asignarAulas'])
    ->name('asignaciones.asignarAulas');

Route::get('/aulas-asignadas', [AsignacionPreviaController::class, 'aulasAsignadas'])->name('aulas.asignadas');



Route::post('/asignaciones/asignar-aula/{asignacionPrevia}', [AsignacionPreviaController::class, 'asignarAula'])
    ->name('asignaciones.asignarAula');

Route::post('/asignaciones/asignar-aulas-masivo', [AsignacionPreviaController::class, 'asignarAulasMasivo'])
    ->name('asignaciones.asignarAulasMasivo');

Route::resource('docentes', DocenteController::class);
Route::resource('materias', MateriaController::class);
Route::resource('aulas', AulaController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('decanaturas', DecanaturaController::class);
Route::resource('carreras', CarreraController::class);
Route::resource('semestres', SemestreController::class);

Route::post('/confirmar-asignaciones', [AsignacionAulaController::class, 'confirmarAsignaciones'])
    ->name('confirmar.asignaciones');

    Route::get('/vaciar/asignacionPrevia', [AsignacionAulaController::class, 'vaciarAsignacionPrevia'])->name('vaciar.asignacionPrevia');
    Route::get('/vaciar/asignacionAula', [AsignacionAulaController::class, 'vaciarAsignacionAula'])->name('vaciar.asignacionAula');
    Route::get('/vaciar-asignacion-dia-aula', [AsignacionAulaController::class, 'vaciarAsignacioDiaAula'])
    ->name('vaciar.asignacion.dia.aula');
    Route::get('/eliminar-tabla', [AsignacionAulaController::class, 'eliminarTabla'])->name('eliminar.tabla');
    Route::get('/vaciar-asignacion-aula-dia', [AsignacionAulaController::class, 'vaciarAsignacionAulaDia'])
    ->name('vaciar.asignacionAulaDia');