<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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


        DB::table('cargos')->insert(array(

            'nome' => 'Assistente de TI',
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'

        ));

        DB::table('empresas')->insert(array(

            'nome' => 'Vitória Hospitalar LTDA',
            'cnpj' => '39.362.611/0001-15',
            'fk_endereco' => 1,
            'created_at' => '2021-09-21 11:09:00',
            'updated_at' => '2021-09-21 11:09:00'

        ));

        DB::table('users')->insert(
            array(
                'nome' => 'Tarcisio dos Santos Souto',
                'email' => 'tss.labsi@gmail.com',
                'senha' => Hash::make('123'),
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
