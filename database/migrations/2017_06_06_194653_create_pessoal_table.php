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
            $table->string('name');
            $table->integer('cpf')->unsigned();
            $table->foreign('cpf')
                    ->references('id')
                    ->on('logins')
                    ->onDelete('cascade');
            $table->integer('rg');
            $table->integer('datanasc');
            $table->string('genero');
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
        Schema::dropIfExists('pessoals');
    }
}
