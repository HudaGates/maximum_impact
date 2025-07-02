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
        // GANTI nama tabel di sini menjadi 'mentor_skills'
        Schema::create('mentor_skills', function (Blueprint $table) {
            $table->id();
            
            // INI BAGIAN PALING PENTING: Tambahkan kolom penghubung yang hilang
            $table->foreignId('mentor_id')->constrained()->onDelete('cascade');
            
            // Kolom untuk data skill
            $table->string('skill_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // GANTI juga nama tabel di sini
        Schema::dropIfExists('mentor_skills');
    }
};