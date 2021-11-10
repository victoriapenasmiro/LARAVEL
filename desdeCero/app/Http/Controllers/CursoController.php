<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Este controlador administra tres rutas distintas.
 * Un método para cada una
 * 
 */
class CursoController extends Controller
{
    //por convención la funcion de la página principal se llama index
    public function index() // --> ahora se llama esta función como __invoke()
    {
        return view("cursos.index");
    }

    //por convención la funcion de la página de registro se llama create
    public function create()
    {
        return view("cursos.create");
    }

    //por convención la funcion mostrará resultados se llama show
    // public function show($curso)
    // {
    //     return view("cursos.show", ["curso" => $curso]);
    // }

    public function show($curso, $categoria = null)
    {
        /* cuando la key se puede llamar igual que la variable
            en vez de enviar el parámetro en este formato ["curso" => $curso]
            se podría enviar como compact("curso");
        */

        if ($categoria) {
            return view("cursos.show", ["curso" => $curso, "categoria" => $categoria]);
            //return "Bienvenido al curso: $curso de la categoria: $categoria";
        } else {
            return view("cursos.show", compact("curso"));
        }
    }
}
