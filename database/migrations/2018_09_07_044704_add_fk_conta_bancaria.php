<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkContaBancaria extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('contas_bancarias', function (Blueprint $table) {
            //$table->integer('idbanco')->unsigned();
            $table->foreign('idbanco')->references('id')->on('bancos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('contas_bancarias', function (Blueprint $table) {
            $table->dropForeign('idbanco')->references('id')->on('bancos');
            //$table->dropcolumn('idbanco');
        });
    }

}
