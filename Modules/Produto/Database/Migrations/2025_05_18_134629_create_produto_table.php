<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcionario_id')->constrained('funcionario');
            $table->foreignId('fornecedor_id')->constrained('fornecedor');
            $table->string('codigo_barras')->unique();
            $table->string('nome_produto');
            $table->integer('quantidade');
            $table->foreignId('categoria_id')->constrained('categoria'); 
            $table->string('tipo_medida'); // kg, litros, etc...
            $table->decimal('preco', 10, 2);
            $table->boolean('perecivel');
            $table->timestamp('data_fabricacao')->nullable();
            $table->timestamp('data_validade')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    /* public function down(): void
    {
        Schema::dropIfExists('produto');
    } */
};
