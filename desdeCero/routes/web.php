<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

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

// Opcion 1: Route::view(''/'', 'welcome');

// Opcion 2: Route::get('/', function () {
//    // return view('welcome');
//    return "Bienvenido a la página principal";
//});

// Opcion 3
Route::get('/', HomeController::class);

/**
 * Cuando indicamos el nombre del controlador::class directamente, espera que solo
 * haya una ruta, por lo que usará el método invoke.
 * En caso de ser un controlador que contenga muchas rutas, se pone entre paréntesis y se envía el
 * nombre de la función que gestionará esa ruta
 * 
 * 
 * name para dar un nombre a la ruta y así poder invocarla según convención
 */
// Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');

// esta ruta tiene que estar antes de la siguiente porqué sino ejecutará la ruta cursos/{curso}
// Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');

// Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');

/* ruta con + de 1 variable
al añadir una interrogación estamos indicando que esta segunda variable es opcional, qué puede estar en la URL o no
Además, hay que añadir un valor por defecto a la variable en caso de que no se envíe
*/
// Route::get('cursos/{id}/{categoria?}', [CursoController::class, 'show'])->name('cursos.show');

// Route::get('cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');

// Route::get('cursos/{curso}/edit',[CursoController::class, 'edit'])->name('cursos.edit');

// Route::put('cursos/{curso}',[CursoController::class, 'update'])->name('cursos.update');

// Route::delete('cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

Route::resource('cursos', CursoController::class);