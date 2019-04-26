<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDailyPhermacyLabratoryRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_phermacy_labratory_room', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('clinic_id');
            $table->string('phermacy_room');
            $table->string('labratory_room');
            $table->longText('ins_fr_do_to_phe');
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
        Schema::dropIfExists('daily_phermacy_labratory_room');
    }
}
