<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionMedicinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_medicins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Medicine_id')->unsigned();
            $table->bigInteger('Prescription_id')->unsigned();
            $table->foreign('Medicine_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->foreign('Prescription_id')->references('id')->on('prescriptions')->onDelete('cascade');
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
        Schema::dropIfExists('prescription_medicins');
    }
}
