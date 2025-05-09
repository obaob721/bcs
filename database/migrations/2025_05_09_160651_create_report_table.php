<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Report;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blotter_id')->constrained('blotter')->onDelete('cascade');
            $table->foreignId('report_offense_id')->constrained('report_offense')->onDelete('cascade');
            $table->timestamps();
        });

        $reports = [
            [
                'blotter_id' => 1,
                'report_offense_id' => 1,
                
            ],
        ];

        foreach($reports as $report){
            Report::create($report);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
