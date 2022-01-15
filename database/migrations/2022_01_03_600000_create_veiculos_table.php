<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('placa');
            $table->string('tipo');
            $table->string('ano');
            $table->unsignedBigInteger('fk_empresa');
            $table->unsignedBigInteger('fk_modelo');

            $table->foreign('fk_empresa')->references('id_empresa')->on('empresas');
            $table->foreign('fk_modelo')->references('id_modelo')->on('modelos');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
