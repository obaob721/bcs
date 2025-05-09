<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->unsignedTinyInteger('age'); // Age 0-120 fits in TinyInteger
            $table->string('phonenumber', 11);
            $table->string('address', 255);
            $table->timestamps(); // created_at and updated_at
        });

        // Insert a sample citizen record for testing purposes
        DB::table('citizens')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'age' => 30,
            'phonenumber' => '09123456789',
            'address' => '123 Main St',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
