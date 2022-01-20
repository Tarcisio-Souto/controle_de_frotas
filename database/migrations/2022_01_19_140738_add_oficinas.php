<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddOficinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::table('oficinas')->insert( array(

            ['nome_oficina' => 'Oficina do Amigo 1',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_oficina' => 'Oficina do Amigo 2',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_oficina' => 'Oficina do Amigo 3',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_oficina' => 'Oficina do Amigo 4',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_oficina' => 'Lokau',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_oficina' => 'CD Malagutti',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_oficina' => 'R Point',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_oficina' => 'Cical Veículos',
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
        Schema::table('oficinas', function (Blueprint $table) {
            //
        });
    }
}
