<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ReportOffense;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_offenses', function (Blueprint $table) {
            $table->report_offense_id();
            $table->string('name');
            $table->timestamps();
        });

        $reportOffenses = [
            ['name' => 'Minor'],
            ['name' => 'Moderate'],
            ['name' => 'Serious'],
        ];

        foreach($reportOffenses as $reportOffense){
            ReportOffense::create($reportOffense);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_offenses');
    }
};
