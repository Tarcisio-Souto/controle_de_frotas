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

            ['nome' => 'Vitória Hospitalar ES',
            'cnpj' => '39.362.611/0001-15',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Vitória Hospitalar MG',
            'cnpj' => '39.362.611/0004-68',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Vitória Hospitalar SP',
            'cnpj' => '39.362.611/0002-04',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Vitória Hospitalar RJ',
            'cnpj' => '32.096.846/0001-63',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Healthcare Logística RJ',
            'cnpj' => '32.096.846/0001-63',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'],

            ['nome' => 'Healthcare Logística SP',
            'cnpj' => '32.096.846/0001-63',
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
