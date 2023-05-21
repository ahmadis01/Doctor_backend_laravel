<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIllnessLaboratoryAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illness_laboratory_analyses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('LaboratoryAnalysis_id')->unsigned();
            $table->bigInteger('Illness_id')->unsigned();
            $table->Date('Date');
            $table->foreign('LaboratoryAnalysis_id')->references('id')->on('laboratory_analyses')->onDelete('cascade');
            $table->foreign('Illness_id')->references('id')->on('illnesses')->onDelete('cascade');
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
        Schema::dropIfExists('illness_laboratory_analyses');
    }
}
