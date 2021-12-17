<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use HasFactory;
    use SoftDeletes;

    //listado de campos a rellenar en la tabla en asignacion masiva
    //si en la request recibe + campos no los tendrá en cuenta
    protected $fillable = [
        'importe',
        'concepto',
        'cuenta_destino',
        'cuenta', //fk
    ];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
}
