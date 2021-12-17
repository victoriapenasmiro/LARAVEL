<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comunidades';

    //listado de campos a rellenar en la tabla en asignacion masiva
    //si en la request recibe + campos no los tendrá en cuenta
    protected $fillable = [
        'cif',
        'activa',
        'partes',
        'presidente',
    ];

}
