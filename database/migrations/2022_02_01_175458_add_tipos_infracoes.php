<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTiposInfracoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tipos_infracoes')->insert( array(

            [
               'descricao_infracao' => 'Estacionado em local proibido',
               'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00'
            ],
            [
                'descricao_infracao' => 'Dirigindo sem a documentação',
                'created_at' => '2021-09-21 11:09:00',
                 'updated_at' => '2021-09-21 11:09:00'
             ],
             [
                'descricao_infracao' => 'Ultrapassagem indevida',
                'created_at' => '2021-09-21 11:09:00',
                 'updated_at' => '2021-09-21 11:09:00'
             ],
             [
                'descricao_infracao' => 'Dirigir com o braço fora da janela',
                'created_at' => '2021-09-21 11:09:00',
                 'updated_at' => '2021-09-21 11:09:00'
             ],
             [
                'descricao_infracao' => 'Dirigir sem o cinto de segurança',
                'created_at' => '2021-09-21 11:09:00',
                 'updated_at' => '2021-09-21 11:09:00'
             ],
             [
                'descricao_infracao' => 'Dirigir com CHN suspensa ou vencida',
                'created_at' => '2021-09-21 11:09:00',
                 'updated_at' => '2021-09-21 11:09:00'
             ],
             [
                'descricao_infracao' => 'Dirigir alcoolizado',
                'created_at' => '2021-09-21 11:09:00',
                 'updated_at' => '2021-09-21 11:09:00'
             ],
             [
                'descricao_infracao' => 'Excesso de velocidade',
                'created_at' => '2021-09-21 11:09:00',
                 'updated_at' => '2021-09-21 11:09:00'
             ],
             [
                'descricao_infracao' => 'Avançar o sinal vermelho do semáforo',
                'created_at' => '2021-09-21 11:09:00',
                 'updated_at' => '2021-09-21 11:09:00'
             ]

        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
