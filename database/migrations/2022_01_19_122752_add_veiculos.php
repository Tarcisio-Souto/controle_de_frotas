<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddVeiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('veiculos')->insert(array(

            [
                'placa' => 'ODF8075',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2011',
                'fk_empresa' => 3,
                'fk_modelo' => 1
            ],

            [
                'placa' => 'ODP3022',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2011',
                'fk_empresa' => 5,
                'fk_modelo' => 2
            ],

            [
                'placa' => 'OVJ9652',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2013',
                'fk_empresa' => 5,
                'fk_modelo' => 3
            ],

            [
                'placa' => 'OYI5963',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2014',
                'fk_empresa' => 3,
                'fk_modelo' => 4
            ],

            [
                'placa' => 'OYJ3516',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2014',
                'fk_empresa' => 5,
                'fk_modelo' => 5
            ],

            [
                'placa' => 'PPG0941',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2015',
                'fk_empresa' => 5,
                'fk_modelo' => 2
            ],

            [
                'placa' => 'PPG0944',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2015',
                'fk_empresa' => 3,
                'fk_modelo' => 6
            ],

            [
                'placa' => 'PPN6751',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2016',
                'fk_empresa' => 6,
                'fk_modelo' => 2
            ],

            [
                'placa' => 'PPO0471',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2015',
                'fk_empresa' => 3,
                'fk_modelo' => 4
            ],

            [
                'placa' => 'PPO4235',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2016',
                'fk_empresa' => 3,
                'fk_modelo' => 6
            ],

            [
                'placa' => 'PPQ0889',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2018',
                'fk_empresa' => 3,
                'fk_modelo' => 7
            ],

            [
                'placa' => 'QRB3609',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2018',
                'fk_empresa' => 4,
                'fk_modelo' => 8
            ],           

            [
                'placa' => 'RBF8F57',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2021',
                'fk_empresa' => 1,
                'fk_modelo' => 2
            ],

            [
                'placa' => 'RQM7B08',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2021',
                'fk_empresa' => 3,
                'fk_modelo' => 2
            ],

            [
                'placa' => 'RQM7B06',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2021',
                'fk_empresa' => 5,
                'fk_modelo' => 2
            ],

            [
                'placa' => 'RQT1C04',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2021',
                'fk_empresa' => 5,
                'fk_modelo' => 2
            ],

            [
                'placa' => 'RQR3E25',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Leve',
                'ano' => '2021',
                'fk_empresa' => 3,
                'fk_modelo' => 8
            ],

            [
                'placa' => 'AXC3252',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2013',
                'fk_empresa' => 6,
                'fk_modelo' => 9
            ],

            [
                'placa' => 'LLX9H45',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2013',
                'fk_empresa' => 6,
                'fk_modelo' => 9
            ],

            [
                'placa' => 'RJR5C34',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2021',
                'fk_empresa' => 6,
                'fk_modelo' => 9
            ],

            [
                'placa' => 'RIR5C34',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2021',
                'fk_empresa' => 6,
                'fk_modelo' => 10
            ],

            [
                'placa' => 'RIR5B17',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2021',
                'fk_empresa' => 5,
                'fk_modelo' => 10
            ],

            [
                'placa' => 'RKB5A89',
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00',
                'tipo' => 'Médio',
                'ano' => '2021',
                'fk_empresa' => 5,
                'fk_modelo' => 10
            ],


        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('veiculos', function (Blueprint $table) {
            //
        });
    }
}
