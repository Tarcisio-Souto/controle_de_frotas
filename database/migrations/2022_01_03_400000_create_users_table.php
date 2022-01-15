<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email');
            $table->string('senha');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('celular');
            $table->string('cpf');
            $table->date('dt_admissao');
            $table->string('email_inst')->nullable();            
            $table->string('src_foto')->nullable();
            $table->string('tel_recado')->nullable();
            $table->string('sexo');
            $table->string('idade');

            $table->unsignedBigInteger('fk_cargo');
            $table->unsignedBigInteger('fk_empresa');
            $table->unsignedBigInteger('fk_endereco');
            
            $table->foreign('fk_cargo')->references('id')->on('cargos');
            $table->foreign('fk_empresa')->references('id')->on('empresas');
            $table->foreign('fk_endereco')->references('id')->on('enderecos');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
