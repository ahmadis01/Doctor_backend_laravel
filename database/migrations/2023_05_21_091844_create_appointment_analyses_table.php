<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_analyses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Appointment_id')->unsigned();
            $table->bigInteger('Analysis_id')->unsigned();
            $table->foreign('Appointment_id')->references('id')->on('appointment_analyses')->onDelete('cascade');
            $table->foreign('Analysis_id')->references('id')->on('analyses')->onDelete('cascade');
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
        Schema::dropIfExists('date_analyses');
    }
}
