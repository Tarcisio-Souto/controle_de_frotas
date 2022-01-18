<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            
            $table->id('id_modelo');
            $table->timestamps();
            $table->string('nome_modelo');            
            $table->unsignedBigInteger('fk_fabricante');   

            $table->foreign('fk_fabricante')->references('id_fabricante')->on('fabricantes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos');
    }
}
