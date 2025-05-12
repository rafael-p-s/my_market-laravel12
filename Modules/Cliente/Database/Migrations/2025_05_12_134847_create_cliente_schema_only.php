<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsuarioSchemaOnly extends Migration
{
    public function up ()
    {
        DB::statement('CREATE SCHEMA IF NOT EXISTS usuario');
    }

    public function down(){}
}