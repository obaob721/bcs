<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Citizen;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citizen', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('age');
            $table->string('phonenumber');
            $table->string('address');
            $table->timestamps();
        });

        $citizens = [
            [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'age' => 31,
                'phonenumber' => '11111111111',
                'address' => 'Minglanilla,Cebu.',
                
            ],
        ];

        foreach($citizens as $citizen){
            Citizen::create($citizen);
        }





    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizen');
    }
};
