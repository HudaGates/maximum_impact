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
    Schema::create('mentor_educations', function (Blueprint $table) {
        $table->id();
        $table->string('university');
        $table->string('title');
        $table->string('field_of_study')->nullable();
        $table->string('location')->nullable();
        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();
        $table->string('grade')->nullable(); // ✅ Tambah ini
        $table->text('activities')->nullable(); // ✅ Tambah ini
        $table->text('description')->nullable(); // ✅ Tambah ini
        $table->timestamps();
    });

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_educations');
    }
};
