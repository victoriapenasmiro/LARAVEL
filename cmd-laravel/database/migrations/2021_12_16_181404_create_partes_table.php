<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('codigo', 4)->nullable();
            $table->integer('cmd_id');

            $table->foreign('cmd_id')->references('id')->on('comunidades');

            $table->timestamps();
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
        Schema::dropIfExists('partes');
    }
}
