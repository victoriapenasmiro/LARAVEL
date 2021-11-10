<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * El método __invoke solo se utiliza cuando queremos administrar
     * UNA SOLA RUTA
     * 
     * Para + rutas, ver ejemplo: CursoController
     * 
     * @return type String Vista DOM
     */
    public function __invoke() {
    //    return view('welcome');
        return view('home');
    }
}
