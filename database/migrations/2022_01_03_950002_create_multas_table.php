<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_multa');
            $table->float('custo_total');
            $table->unsignedBigInteger('fk_veiculo');
            $table->unsignedBigInteger('fk_infracao');
            
            $table->foreign('fk_veiculo')->references('id')->on('veiculos');
            $table->foreign('fk_infracao')->references('id')->on('tipos_infracoes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multas');
    }
}
