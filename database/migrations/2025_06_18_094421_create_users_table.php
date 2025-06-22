<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Dari step 1
            $table->string('last_name');  // Dari step 1
            $table->string('phone')->nullable(); // Dari step 1, bisa null jika tidak wajib
            $table->string('email')->unique();   // Dari step 2, harus unik
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // Dari step 2
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};