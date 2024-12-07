<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned(); // foreign key column (unsigned to match users' userId)
            $table->bigInteger('appointmentId')->unsigned(); // foreign key column (unsigned to match appointment's appointmentId)
            $table->integer('finalPrice'); // equivalent to 'int'
            $table->longText('paymentType'); // equivalent to 'longtext'
            $table->date('paymentDate'); // equivalent to 'date'
            $table->string('appointmentDate', 45); // equivalent to 'varchar(45)'
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('appointmentId')
                  ->references('id')->on('appointments')
                  ->onDelete('cascade')  // on delete cascade
                  ->onUpdate('cascade'); // on update cascade

            $table->foreign('userId')
                  ->references('id')->on('users')
                  ->onDelete('cascade'); // optional: cascade delete (depends on your needs)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
