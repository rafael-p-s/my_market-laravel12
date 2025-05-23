<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table){
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cpf')->unique();
            $table->string('telefone')->nullable();
            $table->string('celular')->unique();
            $table->string('endereco');
            $table->integer('numero_casa');
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('estado');

            $table->string('email')->unique();
            $table->string('password');

            $table->timestamps();
        });
    }
}
