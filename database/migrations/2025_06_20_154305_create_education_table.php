<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // PENTING: Nama tabel jamak 'educations' agar sesuai konvensi Laravel.
        // Error Anda mencari 'education' (singular), ini bisa jadi masalah.
        // Dengan menggunakan 'educations' (plural), kita mengikuti standar.
        Schema::create('educations', function (Blueprint $table) {
            $table->id();

            // Ini adalah kolom 'mentor_id'.
            // constrained() akan otomatis merujuk ke tabel 'mentors' kolom 'id'.
            // onDelete('cascade') berarti jika mentor dihapus, semua data edukasinya ikut terhapus.
            $table->foreignId('mentor_id')->constrained()->onDelete('cascade');

            $table->string('school_name');
            $table->string('degree')->nullable();
            $table->year('start_year');
            $table->year('end_year')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};