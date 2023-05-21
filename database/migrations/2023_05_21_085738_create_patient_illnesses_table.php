<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientIllnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_illnesses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Illness_id')->unsigned();
            $table->bigInteger('Patient_id')->unsigned();
            $table->foreign('Illness_id')->references('id')->on('illnesses')->onDelete('cascade');
            $table->foreign('Patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_illnesses');
    }
}
