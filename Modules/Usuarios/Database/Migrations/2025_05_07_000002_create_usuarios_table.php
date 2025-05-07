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
        Schema::create('usuario.usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cpf')->unique();
            $table->string('telefone')->nullable();
            $table->string('celular');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->boolean('funcionario');

            $table->string('email')->unique();
            $table->string('password');


            // Foreign keys
            // $table->foreignId('funcionario')->constrained('usuarios.funcionario');
            $table->foreignId('tipo_cargo')->constrained('usuario.cargo');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
