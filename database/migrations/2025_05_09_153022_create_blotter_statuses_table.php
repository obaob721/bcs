<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BlotterStatus;


return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('blotter_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $blotterStatuses = [
            ['name' => 'Pending'],
            ['name' => 'Ongoing'],
            ['name' => 'Settled'],
        ];

        foreach($blotterStatuses as $blotterStatus){
            BlotterStatus::create($blotterStatus);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blotter_statuses');
    }
};
