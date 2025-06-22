<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            
            // Kolom ini mengikat setiap bisnis ke seorang pengguna (user)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Data dari setiap langkah (step)
            $table->string('business_name')->nullable(); // Step 1
            $table->string('industry')->nullable();      // Step 2
            $table->text('growth_plan')->nullable();     // Step 3
            $table->text('ambition_plan')->nullable();   // Step 4
            $table->text('profit_goal')->nullable();     // Step 5
            $table->text('team_plan')->nullable();       // Step 6
            $table->string('sdg_goal')->nullable();      // Step 7
            $table->text('battle_plan')->nullable();     // Step 8 (saya ganti nama dari 'step8')
            $table->string('user_name')->nullable();       // Step 9
            $table->string('user_email')->nullable();      // Step 9

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('businesses');
    }
};