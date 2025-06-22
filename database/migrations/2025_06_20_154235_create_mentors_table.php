<?php


// file: ..._create_mentors_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // PENTING: Nama tabel harus jamak 'mentors'
        Schema::create('mentors', function (Blueprint $table) {
            $table->id(); // Ini adalah primary key yang akan dirujuk oleh mentor_id
            $table->string('name');
            $table->string('title');
            $table->string('location');
            $table->string('university');
            $table->text('about');
            $table->string('profile_photo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};