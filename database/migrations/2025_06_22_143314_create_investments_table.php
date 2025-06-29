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
    Schema::create('investments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); 

        $table->string('investor_name');
        $table->decimal('amount', 15, 2);
        $table->string('funding_type');
        $table->string('project');
        $table->string('payment_method');
        
        // UBAH BARIS-BARIS INI
        $table->string('sender')->nullable();
        $table->string('origin_bank')->nullable();
        $table->string('destination_bank')->nullable();
        // -----------------------

        $table->string('status')->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};