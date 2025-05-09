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
        Schema::create('blotters', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing primary key named 'id'
            $table->foreignId('citizen_id')->constrained('citizens')->onDelete('cascade');
            $table->foreignId('blotter_status_id')->constrained('blotter_statuses')->onDelete('cascade');
            $table->string('complainant');
            $table->string('incident_type');
            $table->string('location');
            $table->string('witness_1');
            $table->string('witness_2');
            $table->timestamps();
        });

        // Define the data to insert into the 'blotters' table
        $blotters = [
            [
                'citizen_id' => 1,
                'blotter_status_id' => 1,
                'complainant' => 'Patpat Obaob',
                'incident_type' => 'Scam',
                'location' => 'St. Cecilias College',
                'witness_1' => 'Guian Sumbi',
                'witness_2' => 'Jaymaica Narvasa',
            ],
            // You can add more records here as needed
        ];

        // Insert the records into the blotters table
        foreach($blotters as $blotter){
            Blotter::create($blotter);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blotters');
    }
};
