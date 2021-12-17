<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->char('iban', 24)->unique();
            $table->char('banco', 4)->default('BBVA');
            $table->date('fecha_apertura')->comment('Fecha de apertura o la del movimiento más antiguo, si se desconociese la de apertura');
            $table->decimal('saldo', 10, 2)->default(0);
            $table->integer('cmd_id');

            $table->foreign('cmd_id')->references('id')->on('comunidades');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
