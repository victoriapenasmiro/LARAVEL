<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Model
{
    use HasFactory;
    use SoftDeletes;

    //no especifico el table name, porqué laravel lo coge en automático sumando una s al modelo.
    //protected $table = 'contactos';

    protected $fillable = [
        'nombre',
        'tlf',
    ];
}
