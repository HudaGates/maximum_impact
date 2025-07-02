// C:\Users\ikhsa\maximum_impact\database\migrations\2025_06_20_154235_create_mentors_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->id(); // Ini membuat kolom `id` sebagai UNSIGNED BIGINT, PRIMARY KEY
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('job_title');
            $table->string('location');
            $table->string('institution');
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