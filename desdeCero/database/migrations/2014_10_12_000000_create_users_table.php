<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();//metodo id() crea una columna de tipo integer e increment
            $table->string('name'); //método string () crea una columna de tipo varchar
            /* podemos especificar la capacidad del varchar sino queremos almacenar
            250 caracteres con string('nombreColumna', 100).
            Si queremos almacenar + caracteres, podemos usar el método text() */
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); //porqué puede llegar a null. Siempre que pueda llegar un valor null hay que enviar la propiedad -> nulable()
            $table->string('password');
            $table->rememberToken();
            /* crea dos columnas (está en plural timestamps) created_at updated_at
            Almacena la hora y la fecha en qué introducimos un registro y lo actualizamos */
            $table->timestamps();
            //softDeletes() --> Este campo sirve para que si se elimina el registro, no se elimina realmente
            //sino que añade la fecha en la q se intentó eliminar y en las selects, no se tienen en cuenta
            //los registros eliminados
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
