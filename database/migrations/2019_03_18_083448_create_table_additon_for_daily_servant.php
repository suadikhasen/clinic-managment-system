<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdditonForDailyServant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_patient_room_data', function (Blueprint $table) {
            $table->longText('patient_result')->nullable();
            $table->longText('in_doctor_phermacy')->nullable();
            $table->longText('in_doctor_labratory')->nullable();
            $table->longText('in_labratory_doctor')->nullable();
            $table->longText('mark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_patient_room_data', function (Blueprint $table) {
            
        });
    }
}
