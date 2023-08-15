<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMedicalFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("Patient_id")->unsigned()->nullable();
            $table->bigInteger("MedicalFile_id")->unsigned()->nullable();
            $table->foreign('Patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('MedicalFile_id')->references('id')->on('medical_files')->onDelete('cascade');
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
