<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('servicos')->insert( array(

            ['descricao_servicos' => 'Lataria e Pintura',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['descricao_servicos' => 'Mecânica',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['descricao_servicos' => 'Pneus',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['descricao_servicos' => 'Lavação',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['descricao_servicos' => 'Revisão',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

        )); 



        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos', function (Blueprint $table) {
            //
        });
    }
}
