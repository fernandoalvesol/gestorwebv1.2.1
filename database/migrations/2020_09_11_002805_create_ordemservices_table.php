<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdemservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordemservices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('veiculo_id')->unsigned();
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->integer('protocolo');
            $table->date('dt_entrada');
            $table->time('hora_entrada', 0);
            $table->date('dt_alteracao');
            $table->enum('status', ['vistoria','aguardando', 'reparo', 'montador', 'pintura',
            'acabamento', 'lavagem', 'entregue', 'detalhe']);
            $table->text('descricao');
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
        Schema::dropIfExists('ordemservices');
    }
}
