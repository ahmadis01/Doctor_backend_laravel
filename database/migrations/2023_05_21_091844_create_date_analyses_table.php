<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_analyses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Date_id')->unsigned();
            $table->bigInteger('Analysis_id')->unsigned();
            $table->foreign('Date_id')->references('id')->on('dates')->onDelete('cascade');
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
