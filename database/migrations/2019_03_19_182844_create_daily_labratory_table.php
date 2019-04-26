<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyLabratoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_labratory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('labratorist_id');
            $table->string('clinic_id');
            $table->string('doctor_id');
            $table->string('labratory_room');
            $table->longText('labratory_result');
            $table->longText('resp_fr_lab_to_doc');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_labratory');
    }
}
