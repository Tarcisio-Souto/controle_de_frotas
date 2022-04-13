<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::table('empresas')->insert(array(

            ['nome' => 'Tarcisio ES',
            'cnpj' => '00.000.000/0000-00',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Tarcisio MG',
            'cnpj' => '11.111.111/1111-11',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Tarcisio SP',
            'cnpj' => '22.222.222/2222-22',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Tarcisio RJ',
            'cnpj' => '33.333.333/3333-33',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Tarcisio Logística RJ',
            'cnpj' => '44.444.444/4444-44',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Tarcisio Logística SP',
            'cnpj' => '55.555.555/5555-55',
            'fk_endereco' => 1,
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
        Schema::table('empresas', function (Blueprint $table) {
            //
        });
    }
}
