<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnNameToCodigoPlanoContas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plano_contas', function (Blueprint $table) {
            $table->renameColumn('nameo', 'codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plano_contas', function (Blueprint $table) {
            $table->renameColumn('codigo', 'name');
        });
    }
}
