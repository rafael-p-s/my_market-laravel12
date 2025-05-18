<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cnpj')->unique();
            $table->string('telefone')->nullable();
            $table->string('celular')->unique();
            $table->string('endereco');
            $table->integer('numero_casa');
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('estado');

            $table->string('email')->unique();
            $table->string('password');
            
            $table->foreignId('cargo_id')->constrained('cargo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('fornecedor');
    // }
};
