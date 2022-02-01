<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddRoot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        
        $senha = 'supernes';

        DB::table('users')->insert(            

            array(                
                'nome' => 'Tarcisio dos Santos Souto',
                'email' => 'tss.labsi@gmail.com',
                'senha' => Hash::make($senha),
                'celular' => '27995901992',
                'cpf' => '14014147703',
                'dt_admissao' => '2021-09-13 08:00:00',
                'email_inst' => 'tarcisio.souto@vitoriahospitalar.com.br',
                'src_foto' => '',
                'tel_recado' => '2733229096',
                'sexo' => 'm',
                'idade' => '28',
                'fk_cargo' => 1,
                'fk_empresa' => 1,
                'fk_endereco' => 1,
                'created_at' => '2021-09-21 11:09:00',
                'updated_at' => '2021-09-21 11:09:00'
            )
        );






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
