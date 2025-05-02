<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedorSchemaOnly extends Migration
{
    public function up()
    {
        DB::statement('CREATE SCHEMA IF NOT EXISTS fornecedor');
    }
    public function down(){}
}