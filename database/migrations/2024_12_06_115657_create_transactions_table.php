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
            $table->increments('transactionId'); // auto-incrementing primary key
            $table->integer('userId')->unsigned(); // foreign key column (unsigned to match users' userId)
            $table->integer('appointmentId')->unsigned(); // foreign key column (unsigned to match appointment's appointmentId)
            $table->integer('finalPrice'); // equivalent to 'int'
            $table->longText('paymentType'); // equivalent to 'longtext'
            $table->date('paymentDate'); // equivalent to 'date'
            $table->string('appointmentDate', 45); // equivalent to 'varchar(45)'

            // Primary key and indexes
            $table->primary('transactionId');
            $table->index('userId');
            $table->index('appointmentId');

            // Foreign key constraints
            $table->foreign('appointmentId')
                  ->references('appointmentId')->on('appointments')
                  ->onDelete('cascade')  // on delete cascade
                  ->onUpdate('cascade'); // on update cascade

            $table->foreign('userId')
                  ->references('userId')->on('users')
                  ->onDelete('cascade'); // optional: cascade delete (depends on your needs)
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
        Schema::dropIfExists('transactions');
    }
}
