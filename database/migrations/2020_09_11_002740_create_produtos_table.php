<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fornecedor_id')->unsigned();
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onDelete('cascade');
            $table->string('name', 155);
            $table->integer('codigo');
            $table->double('preco_antigo', 8,2);
            $table->double('preco_atual', 8,2);
            $table->date('dt_ultima_compra');
            $table->date('dt_cadastro');
            $table->integer('estoque');
            $table->integer('estoque_minimo');
            $table->integer('n_nfiscal');
            $table->date('dt_emissao');
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
        Schema::dropIfExists('produtos');
    }
}
