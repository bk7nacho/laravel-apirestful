<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personas_id')->unsigned();

            $table->integer('users_id')->unsigned();

            $table->integer('estado')->default(1); //1: Activo - 0: Inactivo

            $table->foreign('personas_id')->references('id')->on('personas');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique('personas_id');
            $table->unique('users_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administradores');
    }
}
