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
        Schema::create('mentor_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained()->onDelete('cascade');
            $table->string('position');
            $table->string('type'); // Dari controller Anda, sepertinya Anda menggunakan 'type' bukan 'job_type'
            $table->string('company'); // Dari controller Anda, sepertinya Anda menggunakan 'company' bukan 'company_name'
            $table->string('location')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            
            // INI YANG PERLU DITAMBAHKAN
            $table->text('description')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_experiences');
    }
};