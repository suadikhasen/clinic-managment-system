<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DailyPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_patient_room_data', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->timestamps();
            $table->string('patient_id');
            $table->string('patient_room')->nullable();
            $table->string('doctor_id')->nullable();
            $table->string('registerar_id')->nullable();

            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_patient_room_data');
    }
}
