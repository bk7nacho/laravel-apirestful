<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('paterno');
            $table->string('materno');
            $table->string('numdocumento')->unique();
            $table->string('sexo');
            $table->string('fijo1')->nullable();
            $table->string('fijo2')->nullable();
            $table->string('celular1')->nullable();
            $table->string('celular2')->nullable();
            $table->date('nacimiento');
            $table->string('direccion')->nullable();
            $table->string('correopersonal');

            $table->integer('gradoestudios_id')->unsigned()->nullable();
            $table->integer('profesiones_id')->unsigned()->nullable();
            $table->integer('tipodocumentos_id')->unsigned();
            $table->integer('paises_id')->unsigned()->nullable();
            $table->integer('departamentos_id')->unsigned()->nullable();
            $table->integer('provincias_id')->unsigned()->nullable();
            $table->integer('distritos_id')->unsigned()->nullable();

            $table->integer('estado')->default(1);
            $table->timestamps();

            $table->foreign('gradoestudios_id')->references('id')->on('gradoestudios');
            $table->foreign('profesiones_id')->references('id')->on('profesiones');
            $table->foreign('tipodocumentos_id')->references('id')->on('tipodocumentos');
            $table->foreign('paises_id')->references('id')->on('paises');
            $table->foreign('departamentos_id')->references('id')->on('departamentos');
            $table->foreign('provincias_id')->references('id')->on('provincias');
            $table->foreign('distritos_id')->references('id')->on('distritos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
