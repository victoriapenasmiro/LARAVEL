<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retorno una array
        $centros = DB::table('centros')->get();

        return $centros;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $centro = [
            'nombre' => $request->nombre,
            'cod_asd' => $request->cod_asd,
            'fec_comienzo_actividad' => $request->fec_comienzo_actividad,
            'opcion_radio' => $request->opcion_radio,
            'guarderia' => $request->guarderia,
            'categoria' => $request->categoria,
            'created_at' =>  Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),  # new \Datetime()
            // "logo" => $request->file('logo')->store('images', 'public'),
        ];

        $centroId = DB::table('centros')->insertGetId($centro);

        $centro['id'] = $centroId;

        return $centro;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centro = DB::table('centros')->where('id', $id)->first();

        return $centro;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('centros')->where('id', $id)->update([
            'nombre' => $request->nombre,
            'cod_asd' => $request->cod_asd,
            'fec_comienzo_actividad' => $request->fec_comienzo_actividad,
            'opcion_radio' => $request->opcion_radio,
            'guarderia' => $request->guarderia,
            'categoria' => $request->categoria,
            'updated_at' => Carbon::now(),
        ]);

        $centro = $this->show($id);

        return $centro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centro = $this->show($id);

        DB::table('centros')->delete($id);

        return $centro;
    }
}
