<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContact;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {

        $is_admin = new Contacto;

        // opcion 1
        // abort_unless(Gate::allows('test2'), 403);

        //opcion 2
        $this->authorize('check-language', $lang); //de esta forma no requiere importar nada

        $contactos = Contacto::orderBy('id')->get(); //Contacto::all()

        return view("agenda.index", compact('contactos', 'lang', 'is_admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        $is_admin = new Contacto;

        $this->authorize('check-language', $lang);
        $this->authorize('create', $is_admin, 403);

        return view("agenda.create", compact('lang', 'is_admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request, $lang)
    {
        $is_admin = new Contacto;

        $this->authorize('check-language', $lang);
        $this->authorize('create', $is_admin, 403);

        //Retrieving An Input Value
        //$request->input('nombre'); 

        $contacto = Contacto::withTrashed()->where('tlf', '=', $request->input('tlf'))->first();

        if ($contacto !== null && $contacto->trashed()) {
            $contacto->restore();

            //update name if it's different
            if ($contacto->nombre != $request->input('nombre')) {
                $contacto->nombre = $request->input('nombre');
                $contacto->save();
            }
        } else {

            // asignación masiva para guardar un recurso en la db
            $contacto = Contacto::create($request->all());
        }

        return redirect()->route('agenda.show', compact('contacto', 'lang', 'is_admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Contacto $contacto)
    {
        $this->authorize('check-language', $lang);

        return view("agenda.show", compact('contacto', 'lang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Contacto $contacto)
    {

        $this->authorize('check-language', $lang);
        $this->authorize('update', $contacto, 403);

        return view('agenda.edit', compact('contacto', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContact $request, $lang, Contacto $contacto)
    {

        $this->authorize('check-language', $lang);
        $this->authorize('update', $contacto, 403);

        $contacto->update($request->all());

        echo "<h3 style='color:green;text-align: center;'>Contacto $contacto->id actualizado</h3>";
        $contactos = Contacto::orderBy('id')->get();

        return view("agenda.index", [
            'contactos' => $contactos,
            'lang' => $lang,
            'is_admin' => $contacto,
        ]);

        //compact('contactos', 'lang')
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Contacto $contacto)
    {

        $is_admin = new Contacto;

        $this->authorize('check-language', $lang);
        $this->authorize('delete', $is_admin, 403);

        $contacto->delete();

        return redirect()->route('agenda.index', compact('lang', 'is_admin'));
    }
}
