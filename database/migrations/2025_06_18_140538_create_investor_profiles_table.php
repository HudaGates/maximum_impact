<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('investor_profiles', function (Blueprint $table) {
            $table->id();
            
            // Kolom ini mengikat setiap profil investor ke seorang pengguna (user)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Data dari setiap langkah (step)
            $table->string('investment_name')->nullable(); // Step 1
            $table->string('investment_focus')->nullable(); // Step 2
            $table->text('growth_plan')->nullable();        // Step 3
            $table->text('ambition_plan')->nullable();      // Step 4
            $table->text('profit_goal')->nullable();        // Step 5
            $table->text('team_plan')->nullable();          // Step 6
            $table->string('sdg_goal')->nullable();         // Step 7
            $table->text('strategy_plan')->nullable();      // Step 8
            $table->string('investor_name')->nullable();    // Step 9
            $table->string('investor_email')->nullable();   // Step 9

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('investor_profiles');
    }
};