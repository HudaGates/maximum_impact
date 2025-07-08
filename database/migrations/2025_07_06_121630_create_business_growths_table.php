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
        // Menggunakan Schema::create untuk MEMBUAT tabel baru
        Schema::create('business_growths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('month');
            $table->integer('year');
            $table->text('goals')->nullable();
            $table->decimal('revenue_target', 15, 2)->nullable();
            $table->decimal('profit_target', 15, 2)->nullable();
            $table->text('team_dev_target')->nullable();
            $table->text('social_impact_target')->nullable();
            $table->text('strategy')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'month', 'year']);
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