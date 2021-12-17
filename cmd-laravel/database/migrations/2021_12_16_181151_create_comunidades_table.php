<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidades', function (Blueprint $table) {
            $table->id();
            $table->string('cif', 9)->unique();
            $table->boolean('activa')->default(true)->comment('comunidad activa por defecto');
            $table->integer('partes')->comment('Cantidad de unidades registrales que componen la comunidad');
            $table->string('presidente', 40)->nullable();

            $table->timestamps(); //created y updated
            $table->softDeletes(); //fecha en la que se elimina la comunidad
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunidades');
    }
}
