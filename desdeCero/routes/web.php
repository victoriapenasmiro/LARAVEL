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
 */
Route::get('cursos', [CursoController::class, 'index']);

// Route::get('cursos', function () {
//     return "Bienvenido a la página cursos";
// });

// esta ruta tiene que estar antes de la siguiente porqué sino ejecutará la ruta cursos/{curso}
Route::get('cursos/create', [CursoController::class, 'create']);

// Route::get('cursos/create', function () {
//     return "En esta página podrás crear un curso";
// });


//Route::get('cursos/{curso}', [CursoController::class, 'show']);

/* En caso de qué tengamos muchas URL's bajo la URL principal /cursos/URL secundaria,
 podríamos declarlo pasando una variable de la siguiente forma.
 Si desde el front escribo la URL "http://localhost/LARAVEL/desdeCero/public/cursos/hola"

 Me retorna: Bienvenido al curso: hola;
*/
// Route::get('cursos/{curso}', function ($curso) {
//     return "Bienvenido al curso: $curso";
// });

/* ruta con + de 1 variable
al añadir una interrogación estamos indicando que esta segunda variable es opcional, qué puede estar en la URL o no
Además, hay que añadir un valor por defecto a la variable en caso de que no se envíe
*/

Route::get('cursos/{curso}/{categoria?}', [CursoController::class, 'show']);
// Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {

//     if ($categoria) {
//         return "Bienvenido al curso: $curso de la categoria: $categoria";
//     } else {
//         return "Bienvenido al curso: $curso";
//     }
    
// });