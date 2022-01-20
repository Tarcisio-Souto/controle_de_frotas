<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('enderecos')->insert(array(

            'logradouro' => 'Av. Nossa Senhora dos Navegantes',
            'numero' => '955',
            'bairro' => 'Enseada do Suá',
            'cidade' => 'Vitória',
            'cep' => '29050-335',
            'uf' => 'ES',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'

        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enderecos', function (Blueprint $table) {
            //
        });
    }
}
