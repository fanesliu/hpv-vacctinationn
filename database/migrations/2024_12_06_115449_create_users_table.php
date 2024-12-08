<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('userId'); // auto increment primary key
            $table->longText('name'); // equivalent to 'longtext'
            $table->longText('email'); // equivalent to 'longtext'
            $table->longText('password'); // equivalent to 'longtext'
            $table->longText('image')->nullable(); // equivalent to 'longtext'
            $table->longText('role'); // equivalent to 'longtext'
            $table->date('created_at')->nullable(); // equivalent to 'date DEFAULT NULL'
            $table->date('updated_at')->nullable(); // equivalent to 'date DEFAULT NULL'
            $table->primary('userId'); // setting the primary key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
