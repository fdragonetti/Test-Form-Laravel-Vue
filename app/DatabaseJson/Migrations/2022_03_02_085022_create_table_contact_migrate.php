<?php

namespace App\DatabaseJson\Migrations;

use DatabaseJson\DatabaseJson;
use DatabaseJson\Migration;

class CreateTableContactMigrate extends Migration
{
    /**
     * How to create table
     *
     * DatabaseJson::table('NameTable',array(
     *  {field_name} => {field_type} More information about field types and usage in PHPDoc
     * ));
     */

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DatabaseJson::create('contacts', array(
            'created_at' => 'string',
            'updated_at' => 'string',
            'name' => 'string',
            'surname' => 'string',
            'email' => 'string',
        ));
    }
}
