<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('razaosocial', 155);
            $table->string('name', 155);
            $table->string('name_contato', 155);
            $table->integer('cpf_cnpj');
            $table->integer('fone');
            $table->integer('celular');
            $table->string('endereco', 155);
            $table->integer('numero');
            $table->string('bairro', 155);
            $table->string('complemento', 155);
            $table->string('cidade', 155);
            $table->string('estado', 100);
            $table->integer('cep', 100);
            $table->text('descricao', 155);
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
        Schema::dropIfExists('fornecedores');
    }
}
