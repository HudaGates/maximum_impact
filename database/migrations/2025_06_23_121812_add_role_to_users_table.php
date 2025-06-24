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
            // TAMBAHKAN BARIS INI
            // Ini akan membuat kolom 'role' setelah kolom 'email'
            // dengan nilai default 'user' agar data lama tidak error.
            $table->string('role')->default('user')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ini untuk membatalkan migrasi jika diperlukan
            $table->dropColumn('role');
        });
    }
};