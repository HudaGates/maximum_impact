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
        // Mengecek apakah tabel 'projects' sudah ada
        if (Schema::hasTable('projects')) {
            Schema::table('projects', function (Blueprint $table) {
                // Hanya tambahkan kolom 'cover_image' jika belum ada
                if (!Schema::hasColumn('projects', 'cover_image')) {
                    $table->string('cover_image')->nullable()->after('kolom_sebelumnya'); // Ganti 'kolom_sebelumnya' dengan nama kolom yang relevan
                }

                // Hanya tambahkan kolom 'user_id' jika belum ada
                if (!Schema::hasColumn('projects', 'user_id')) {
                    $table->bigInteger('user_id')->unsigned()->nullable()->after('id'); // Menempatkan setelah kolom 'id'
                    
                    // Opsional: Jika Anda ingin menambahkan foreign key constraint
                    // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Mengecek apakah tabel 'projects' sudah ada
        if (Schema::hasTable('projects')) {
            Schema::table('projects', function (Blueprint $table) {
                // Hanya hapus kolom 'cover_image' jika ada
                if (Schema::hasColumn('projects', 'cover_image')) {
                    $table->dropColumn('cover_image');
                }

                // Hanya hapus kolom 'user_id' jika ada
                if (Schema::hasColumn('projects', 'user_id')) {
                    // Jika Anda menambahkan foreign key, hapus dulu constraint-nya
                    // $table->dropForeign(['user_id']); 
                    $table->dropColumn('user_id');
                }
            });
        }
    }
};