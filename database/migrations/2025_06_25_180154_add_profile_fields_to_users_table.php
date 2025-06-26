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
        Schema::table('users', function (Blueprint $table) {
            // Kolom tambahan profil
            $table->string('name')->nullable()->after('id'); // ⬅️ tambahkan ini
            $table->string('job_title')->nullable();
            $table->string('location')->nullable();
            $table->string('institution')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name', 'job_title', 'location', 'institution']);
        });
    }
};
