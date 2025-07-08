<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_add_sdgs_data_to_projects_table.php
public function up()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->text('sdgs_data')->nullable()->after('roadmap'); // Menyimpan data SDG (misal: "SDG 1,SDG 5")
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
