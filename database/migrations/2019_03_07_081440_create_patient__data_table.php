<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->String('clinic_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('grand_name');
            $table->string('age');
            $table->string('sex');
            $table->string('photo_path')->default('/storage/profilepicture.jpg');
            $table->string('file_path')->nullable();
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient__data');
    }
}
