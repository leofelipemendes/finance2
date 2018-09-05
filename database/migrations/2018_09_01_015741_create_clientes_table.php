<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->bigInteger('rg')->nullable();
            $table->bigInteger('cpf')->nullable()->unique();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->integer('idcidade')->nullable();
            $table->integer('idUF')->nullable();            
            $table->integer('ddd_res')->nullable();
            $table->integer('tel_res')->nullable();
            $table->integer('ddd_cel')->nullable();
            $table->integer('tel_cel')->nullable();
            $table->integer('ddd_out')->nullable();
            $table->integer('tel_out')->nullable();
            $table->string('contato')->nullable();
            $table->string('email')->nullable()->unique();
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
        Schema::dropIfExists('clientes');
    }
}
