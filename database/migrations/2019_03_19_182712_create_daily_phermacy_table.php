<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyPhermacyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_phermacy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('phermacy_room');
            $table->string('clinic_id');
            $table->string('doctor_id');
            $table->string('phermacist_id');
            $table->longText('phermacy_result');
            $table->longText('ins_fr_do_to_pher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_phermacy');
    }
}
