<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuenta extends Model
{
    use HasFactory;
    use SoftDeletes;

    //protected $table = "partes"; --> no necesario, porqué Laravel genera el plural por defecto, añadiendo s

    protected $fillable = [
        'iban',
        'banco',
        'fecha_apertura',
        'saldo',
        'cmd_id',// lo añadimos en fillable ?
    ];

    public function comunidad()
    {
        return $this->belongsTo(Comunidad::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
