<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->increments('vaccineId'); // auto-incrementing primary key
            $table->longText('dose'); // equivalent to 'longtext'
            $table->integer('price'); // equivalent to 'int'
            $table->longText('description'); // equivalent to 'longtext'
            $table->primary('vaccineId'); // setting 'vaccineId' as the primary key
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccines');
    }
}
