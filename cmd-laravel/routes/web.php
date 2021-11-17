<?php

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