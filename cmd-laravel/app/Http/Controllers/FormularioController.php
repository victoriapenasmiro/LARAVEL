<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FormularioController extends Controller
{
    public function create($lang)
    {
        
        App::setLocale($lang);

        return view('Formulario', compact("lang"));
    }

    public function store(Request $request)
    {

        $current_lang = $request->session()->get('lang');

        //recupero el lang de una sesion
        App::setLocale($current_lang);

        $request->validate([
            'name'=> 'required|string',
            'email' => 'required|email:rfc,dns',
            'pw' => 'required|size:8|alpha_num',
            'address' => 'required|string|alpha_num|max:155',
            'city' => 'required|alpha',
            'state' => 'nullable',
            'zip' => 'required|integer|min:5|max:7',
            'check' => 'required',
        ]);

        return "Formulario Enviado";
    }
}
