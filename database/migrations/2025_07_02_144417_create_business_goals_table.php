<?php
// dalam file ...fix_business_growths_table_structure.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('business_growths', function (Blueprint $table) {
            // HAPUS kolom-kolom lama yang spesifik per bulan
            $table->dropColumn([
                'goals_month_1',
                'revenue_target_month_2',
                'profit_target_month_3',
                'team_dev_target_month_4',
                'social_impact_target_month_5',
                'strategy_month_6',
            ]);

            // TAMBAHKAN kolom-kolom baru yang dinamis dan generik
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->after('id');
            $table->integer('month')->after('user_id'); // Untuk menyimpan bulan (1, 2, 3, dst.)
            $table->integer('year')->after('month');  // Untuk menyimpan tahun (2024, 2025)

            $table->text('goals')->nullable();
            $table->text('revenue_target')->nullable();
            $table->text('profit_target')->nullable();
            $table->text('team_dev_target')->nullable();
            $table->text('social_impact_target')->nullable();
            $table->text('strategy')->nullable();

            // Pastikan tidak ada data ganda untuk user di bulan dan tahun yang sama
            $table->unique(['user_id', 'month', 'year']);
        });
    }
};