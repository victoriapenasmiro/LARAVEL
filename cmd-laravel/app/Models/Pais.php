<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';

    //listado de campos a rellenar en la tabla en asignacion masiva
    //si en la request recibe + campos no los tendrá en cuenta
    // esto es necesario, porqué en la request está el token y este dato no se inserta en la db
    // lo que provoca un error
    protected $fillable = [
        'codigoISO3',
        'codigoISO2',
        'cod_numerico',
        'nombre',
    ];
}
