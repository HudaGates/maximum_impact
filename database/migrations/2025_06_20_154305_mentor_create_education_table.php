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
        // GANTI nama tabel di sini menjadi 'mentor_educations'
        Schema::create('mentor_educations', function (Blueprint $table) {
            $table->id();
            
            // Pastikan relasi ke tabel mentors sudah benar
            $table->foreignId('mentor_id')->constrained()->onDelete('cascade');
            
            // Kolom-kolom untuk data edukasi
            $table->string('university');
            $table->string('title'); // e.g., Bachelor's, Master's
            $table->string('field_of_study')->nullable();
            $table->string('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('grade')->nullable();
            $table->text('activities')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // GANTI juga nama tabel di sini
        Schema::dropIfExists('mentor_educations');
    }
};