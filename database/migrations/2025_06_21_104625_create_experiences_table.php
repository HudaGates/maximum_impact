<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('mentor_experiences', function (Blueprint $table) {
    $table->id();

    $table->string('position'); // dari $fillable
    $table->string('type'); // dari $fillable, misal: Full-time, Internship, dsb
    $table->string('company');
    $table->string('location');
    
    $table->date('start_date')->nullable();
    $table->date('end_date')->nullable();
    $table->text('description')->nullable();

    $table->timestamps();

    // Relasi (optional)


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
