<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque.produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade');
            $table->string('codigo_barras')->unique();

            // Foreign keys
            $table->foreignId('categoria_id')->constrained('estoque.categorias');
            $table->foreignId('fornecedor_id')->constrained('estoque.fornecedores');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /* public function down()
    {
        // Incluí a remoção das chaves estrangeiras antes de remover a tabela, garantindo que a migration seja revertida corretamente.
    
        Schema::table('estoque.produtos', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['fornecedor_id']);
        });
        
        Schema::dropIfExists('estoque.produtos');
    } */
}
