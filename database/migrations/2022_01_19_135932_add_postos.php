<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPostos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::table('postos')->insert( array(

            ['nome_posto' => 'Posto ES',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_posto' => 'Posto MG',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_posto' => 'Posto RJ',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome_posto' => 'Posto SP',
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
        Schema::table('postos', function (Blueprint $table) {
            //
        });
    }
}
