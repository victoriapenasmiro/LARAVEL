<?php

use App\Http\Controllers\api\ApiController;
use Illuminate\Support\Facades\DB;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('api/index');

})->name('centros');

Route::get('/create', function () {
    return view('api/create');

})->name('centros.create');

Route::get('/{id}', function ($id) {

    $api = new ApiController;
    $centro = $api->show($id);

    return view('api/show', compact("centro"));

})->name('centros.show');

Route::get('/{id}/edit', function ($id) {

    $api = new ApiController;
    $centro = $api->show($id);

    return view('api/edit', compact("centro"));

})->name('centros.edit');