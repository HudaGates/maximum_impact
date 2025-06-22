<?php

// ... database/migrations/..._create_expenses_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('amount', 15, 2);
            $table->string('category');
            $table->text('description')->nullable();
            $table->string('proof_of_purchase')->nullable();
            $table->timestamps();
        });
    }
    // ... down() method ...
};