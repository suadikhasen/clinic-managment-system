<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateDailyServantPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_servant_patient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clinic_id');
            $table->string('servant_id');
            $table->string('phermacy_result');
            $table->string('labratory_result');
            $table->string('ins_fr_do_phe');
            $table->string('ins_fr_do_lab');
            $table->string('ins_fr_lab_do');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
