<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE SCHEMA Produtos');
        Schema::create('Produtos.produtos', function (Blueprint $table) {
            $table->id();  // ID autoincrementável
            $table->string('nome');  // Nome do produto
            $table->text('descricao')->nullable();  // Descrição do produto
            $table->decimal('preco', 10, 2);  // Preço do produto
            $table->integer('quantidade');  // Quantidade disponível
            $table->string('codigo_barras')->unique();  // Código de barras único
            $table->string('categoria');
            $table->timestamps();  // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Produtos.produtos');
    }
}
