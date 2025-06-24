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
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('goals')->nullable();
            $table->string('market')->nullable();
            $table->string('tag')->nullable();
            $table->string('start_date')->nullable(); // Tetap string untuk format DD-MM-YYYY
            $table->string('end_date')->nullable();
            $table->string('pitch_deck')->nullable();
            $table->string('video')->nullable();
            $table->enum('category', ['New Business', 'Existing Business'])->nullable();
            $table->string('investment_needs')->nullable();
            $table->text('roadmap')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};