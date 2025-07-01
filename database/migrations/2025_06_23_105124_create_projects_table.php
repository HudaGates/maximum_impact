<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Pindahkan ke atas agar lebih rapi
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('goals')->nullable();
            $table->string('market')->nullable();
            $table->string('tag')->nullable();
            $table->date('start_date')->nullable(); // Ganti ke tipe 'date' agar lebih sesuai
            $table->date('end_date')->nullable();
            $table->string('pitch_deck')->nullable();
            $table->string('video')->nullable();
            
            // === BARIS YANG DITAMBAHKAN ===
            $table->string('cover_image')->nullable(); 
            // =============================
            
            $table->enum('category', ['New Business', 'Existing Business'])->nullable();
            $table->string('investment_needs')->nullable();
            $table->text('roadmap')->nullable();
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};