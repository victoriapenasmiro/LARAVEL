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
    protected $fillable = [
        'codigoISO3',
        'codigoISO2',
        'cod_numerico',
        'nombre',
    ];
}
