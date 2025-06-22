<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('sender');
            $table->string('source_bank');
            $table->string('destination_bank');
            $table->decimal('amount', 15, 2); // Menggunakan decimal untuk presisi
            $table->string('funding_type');
            $table->string('investment_type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};