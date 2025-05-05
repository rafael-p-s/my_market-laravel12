<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEstoqueSchemaOnly extends Migration
{
    public function up()
    {
        DB::statement('CREATE SCHEMA IF NOT EXISTS estoque');
    }

    public function down(){}
}
