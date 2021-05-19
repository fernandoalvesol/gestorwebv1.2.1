<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrancaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobranca', function (Blueprint $table) {
            $table->increments('id');
            $table->string('associado');
            $table->string('placa');
            $table->decimal('valor_mensalidade', 8, 2);
            $table->decimal('valor_acordo', 8, 2);
            $table->string('status');
            $table->date('data');
            $table->date('data_pagamento');
            $table->string('local_pag');
            $table->string('atendente');
            $table->string('rastreador');
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
        Schema::dropIfExists('cobranca');
    }
}
