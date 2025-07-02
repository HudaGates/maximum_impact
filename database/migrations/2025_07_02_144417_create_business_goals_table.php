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
        Schema::create('business_growths', function (Blueprint $table) {
            $table->id();

            // Kolom-kolom ini sekarang sesuai 1-to-1 dengan 'name' pada textarea di setiap view
            $table->text('goals_month_1')->nullable();                  // Dari bussines-growth1.blade.php
            $table->text('revenue_target_month_2')->nullable();         // Dari bussines-growth2.blade.php
            $table->text('profit_target_month_1')->nullable();          // Dari bussines-growth3.blade.php
            $table->text('team_dev_target_month_1')->nullable();       // Dari bussines-growth4.blade.php
            $table->text('social_impact_target_month_1')->nullable();   // Dari bussines-growth5.blade.php
            $table->text('strategy_month_1')->nullable();               // Dari bussines-growth7.blade.php
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_growths');
    }
};