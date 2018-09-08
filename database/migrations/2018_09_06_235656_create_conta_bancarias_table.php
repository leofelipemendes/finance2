<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas_bancarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('idbanco')->unsigned();
            $table->integer('agencia');
            $table->integer('dig_ag');
            $table->integer('nr_conta');
            $table->integer('dig_conta');
            $table->integer('tipo_conta');
            $table->boolean('ativo');
            $table->softDeletes();
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
        Schema::dropIfExists('contas_bancarias');
    }
}
