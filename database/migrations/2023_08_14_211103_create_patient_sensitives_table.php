<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientSensitivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_sensitives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("Patient_id")->unsigned()->nullable();
            $table->bigInteger("Sensitive_id")->unsigned()->nullable();
            $table->foreign('Patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('Sensitive_id')->references('id')->on('sensitives')->onDelete('cascade');
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
        Schema::dropIfExists('patient_sensitives');
    }
}
