<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    public function up()
    {
        Schema::create('usuario.cliente', function (Blueprint $table){
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cpf');
            $table->string('telefone');
            $table->string('celular');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');

            $table->string('email');
            $table->string('password');

            $table->timestamps();
        });
    }
}
