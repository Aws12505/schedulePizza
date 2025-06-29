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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('emp_id');
            $table->date('hired_date')->nullable();
            $table->decimal('hourly_pay', 8, 2)->nullable();
            $table->decimal('hourly_perf_pay', 8, 2)->nullable();
            $table->boolean('is_1099')->default(false);
            $table->boolean('family')->default(false);
            $table->boolean('car')->default(false);
            $table->date('dob')->nullable();
    
            // Each day has: VCI (bool), IN (time), OUT (time)
            foreach (['tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'monday'] as $day) {
                $table->boolean("{$day}_vci")->default(false);
                $table->time("{$day}_in")->nullable();
                $table->time("{$day}_out")->nullable();
            }
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
