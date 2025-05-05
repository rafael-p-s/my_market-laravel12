<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('estoque.fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cnpj')->unique();
            $table->string('telefone')->nullable();
            $table->string('celular');
            $table->string('cidade');
            $table->string('estado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('fornecedor.fornecedor');
    }
};
