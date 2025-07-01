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
        Schema::table('projects', function (Blueprint $table) {
            // Menambahkan kolom user_id sebagai foreign key setelah kolom 'id'
            // constrained() secara otomatis mengarah ke tabel 'users'
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->after('id');
            
            // Menambahkan kolom cover_image setelah kolom 'end_date'
            $table->string('cover_image')->nullable()->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Hapus foreign key constraint SEBELUM menghapus kolomnya
            $table->dropForeign(['user_id']);
            
            // Hapus kolom yang ditambahkan
            $table->dropColumn(['user_id', 'cover_image']);
        });
    }
};