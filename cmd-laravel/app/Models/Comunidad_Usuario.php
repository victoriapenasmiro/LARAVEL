<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad_Usuario extends Model
{
    use HasFactory;

    protected $table = 'comunidades_usuarios';

    protected $fillable = [
        'cmd_id',
        'usario_id',
    ];
}
