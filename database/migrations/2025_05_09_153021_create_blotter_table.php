<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Blotter;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blotter', function (Blueprint $table) {
            $table->id('blotter_id');
            $table->foreignId('citizen_id')->constrained('citizen')->onDelete('cascade');
            $table->foreignId('blotter_status_id')->constrained('blotter_status')->onDelete('cascade');
            $table->string('complainant');
            $table->string('incident_type');
            $table->string('location');
            $table->string('witness_1');
            $table->string('witness_2');
            $table->timestamps();
        });


        $blotters = [
            [
                'complainant' => 'Patpat Obaob',
                'incident_type' => 'Scam',
                'location' => 'St.Cecilias College',
                'witness_1' => 'Guian Sumbi',
                'witness_2' => 'Jaymaica Narvasa',
                'blotter_status_id' => 1,
                'citizen_id' => 1,
            ],
        ];

        foreach($blotters as $blotter){
            Blotter::create($blotter);
        }





    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blotter');
    }
};