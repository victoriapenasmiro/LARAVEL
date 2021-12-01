<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    /* en caso de que la tabla tenga un nombre diferente a cursos, el plural
    del nombre del modelo se puede indicar con el siguiente código
    */
    // protected $table = "users";

    /* con esta propiedad, indicamos que al hacer un insert con asignación masiva,
    solo se realice con los siguientes campos, si en la request recibe más campos
    no los tendrá en cuenta
    esto es necesario, porqué en la request está el token y este dato no se inserta en la db
    lo que provoca un error */
    //protected $fillable = ['name', 'description', 'categoria'];

    /**
     * En caso de que tenamos un formulario con muchos campos,
     * se podría utilizar la siguiente propiedad para indicar los campos protegidos,
     * que no deben insertarse en db, es lo contrario a $fillable.
     * 
     * En este ejemplo, no tenemos ningun campo protegido, por lo que podemos dejar la array vacía
     * 
     */
    protected $guarded = [];
}
