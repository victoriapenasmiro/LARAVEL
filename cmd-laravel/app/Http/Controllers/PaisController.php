<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        App::setLocale($lang);

        //recupero todos los registros sin ordenación
        $paises = Pais::all();

        //recupero todos los registros ordenándolos por el campo codigoISO3 de forma ASC
        //$paises = Pais::orderBy('codigoISO3')->get();

        return view("paises.index", compact('paises', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        //recupero el lang
        App::setLocale($lang);

        return view("paises.create", compact('lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lang)
    {
        //recupero el lang
        App::setLocale($lang);

        $request->validate([
            'nombre' => 'required|string|max:50',
            'codigoISO3' => 'required|size:3|alpha',
            'codigoISO2' => 'required|size:2|alpha',
            'cod_numerico' => 'required|integer',
        ]);

        // asignación masiva para guardar un recurso en la db
        $pais = Pais::create($request->all());

        return redirect()->route('paises.show', compact('lang', 'pais'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Pais $pais)
    {
        return view('paises.show', compact('lang', 'pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Pais $pais)
    {
        //recupero el lang
        App::setLocale($lang);

        return view('paises.edit', compact('lang', 'pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, Pais $pais)

    {
        //recupero el lang
        App::setLocale($lang);

        $request->validate([
            'nombre' => 'required|string|max:50',
            'codigoISO3' => 'required|size:3|alpha',
            'codigoISO2' => 'required|size:2|alpha',
            'cod_numerico' => 'required|integer',
        ]);

        //actualización por asignación masiva
        $pais->update($request->all());

        echo "<h3 style='color:green;text-align: center;'>Pais actualizado</h3>";
        $paises = Pais::all();

        return view("paises.index", compact('paises', 'lang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Pais $pais)
    {
        //recupero el lang
        App::setLocale($lang);

        $pais->delete();

        echo "<h3 style='color:green;text-align: center;'>Pais $pais->nombre eliminado</h3>";
        $paises = Pais::all();

        return view('paises.index', compact('paises', 'lang'));
    }
}
