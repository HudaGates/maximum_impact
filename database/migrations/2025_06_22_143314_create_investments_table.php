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
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The investor
        $table->decimal('amount', 15, 2);
        $table->string('funding_type');
        $table->string('project');
        $table->string('payment_method');
        $table->string('status')->default('Submitted'); // Submitted, Processed, Approved, Rejected
        $table->timestamps();
    });
}
// ...

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
