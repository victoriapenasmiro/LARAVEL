<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidades_usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('cmd_id');
            $table->integer('usuario_id');

            $table->foreign('cmd_id')->references('id')->on('comunidades');
            $table->foreign('usuario_id')->references('id')->on('users');
                        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunidades_usuarios');
    }
}
