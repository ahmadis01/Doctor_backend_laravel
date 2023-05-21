<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoryAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratory_analyses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Laboratory_id')->unsigned();
            $table->bigInteger('Analysis_id')->unsigned();
            $table->foreign('Laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
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
        Schema::dropIfExists('laboratory_analyses');
    }
}
