<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->date('data_competencia');
            $table->date('data_vencimento');
            $table->decimal('valor');
            $table->boolean('pago');
            $table->integer('idfornecedor')->unsigned()->nullable();
            $table->integer('idcliente')->unsigned()->nullable();
            $table->integer('idcategoria')->unsigned();
            $table->integer('idconta')->unsigned(); //conta (conta bancaria de saida eu entrada de fundos)
            $table->integer('idcentrocusto')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::table('lancamentos', function (Blueprint $table) {
            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->foreign('idconta')->references('id')->on('contas_bancarias');
            $table->foreign('idfornecedor')->references('id')->on('fornecedores');
            $table->foreign('idcliente')->references('id')->on('clientes');
            $table->foreign('idcentrocusto')->references('id')->on('centro_custos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamentos');
    }
}
