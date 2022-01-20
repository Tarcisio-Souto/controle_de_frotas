<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddModelos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('modelos')->insert(array(
        
            ['nome_modelo' => 'Symbol',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 1],

            ['nome_modelo' => 'Montana',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 2],

            ['nome_modelo' => 'Kangoo',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 1],

            ['nome_modelo' => 'Logan',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 1],

            ['nome_modelo' => 'Sandero',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 1],

            ['nome_modelo' => 'Palio',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 3],

            ['nome_modelo' => 'Versa',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 4],

            ['nome_modelo' => 'Spin',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 2],

            ['nome_modelo' => 'Fiorino',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00',
            'fk_fabricante' => 3]            
            
        ));
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
