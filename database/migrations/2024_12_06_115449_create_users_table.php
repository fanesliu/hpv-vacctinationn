 <?php

 use Illuminate\Database\Migrations\Migration;
 use Illuminate\Database\Schema\Blueprint;
 use Illuminate\Support\Facades\Schema;
 
 return new class extends Migration
 {
     /**
      * Run the migrations.
      */
     public function up(): void
     {
         Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText('name'); // equivalent to 'longtext'
            $table->longText('email'); // equivalent to 'longtext'
            $table->longText('password'); // equivalent to 'longtext'
            $table->longText('image')->nullable(); // equivalent to 'longtext'
            $table->string('role'); // equivalent to 'longtext'
            $table->timestamps();
        });
 
         Schema::create('sessions', function (Blueprint $table) {
             $table->string('id')->primary();
             $table->foreignId('user_id')->nullable()->index();
             $table->string('ip_address', 45)->nullable();
             $table->text('user_agent')->nullable();
             $table->longText('payload');
             $table->integer('last_activity')->index();
         });
     }
 
     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::dropIfExists('users');
         Schema::dropIfExists('password_reset_tokens');
         Schema::dropIfExists('sessions');
     }
 };
