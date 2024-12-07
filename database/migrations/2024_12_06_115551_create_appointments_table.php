<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the table already exists
        if (!Schema::hasTable('appointments')) {
            Schema::create('appointments', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('vaccineId')->unsigned(); // foreign key column, unsigned to match vaccineId's type
                $table->longText('place'); // equivalent to 'longtext'
                $table->integer('dateAvailibilityStart'); // equivalent to 'int'
                $table->integer('dateAvailibilityEnd'); // equivalent to 'int'


                // foreign key constraint
                $table->foreign('vaccineId')
                      ->references('id')->on('vaccines')
                      ->onDelete('cascade')  // on delete cascade
                      ->onUpdate('cascade'); // on update cascade
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
