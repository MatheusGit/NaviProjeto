<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('login_id')->unsigned();
            $table->string('cpf')->nullable();
            $table->foreign('login_id')
                    ->references('id')
                    ->on('logins')
                    ->onDelete('cascade');
            $table->integer('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('rg')->nullable();
            $table->string('cep')->nullable();
            $table->string('datanasc')->nullable();
            $table->enum('genero_select',['Masculino','Feminino','Outro'])->nullable();
            $table->enum('complemento_select',['Sim','Nao'])->nullable();
            $table->string('outro')->nullable();
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
        Schema::dropIfExists('pessoals');
    }
}
