<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\VisitasController;
use Illuminate\Support\Facades\Route;

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


//para verlo en el remoto: http://cmd-laravel.ddns.net/index.php/visitas

//al no indicar corchete, busca la clase __invoke del controlador
Route::get('visitas/{contador?}', VisitasController::class);

Route::get('agenda', function () {
    return view('agenda');
});

Route::get('/formulario', function () {
    return redirect("es/formulario");
});

Route::get('{lang}/formulario', [FormularioController::class, 'create'])->name('registro.create');

Route::post('/formulario', [FormularioController::class, 'store'])->name('registro.store');

Route::get('formularioclase', function () {
    return view('formclase');
});


//opción middelware 1
Route::middleware('test')->get('pruebaMiddelware', function () {
});

//opción middelware 2
Route::get('pruebaMiddelware2', function () {
})->middleware(['test']);

//en caso de que se tenga que pasar + de 1 middelware se pondría en una array (['test1', 'test2']);

Route::resource('paises', PaisController::class);