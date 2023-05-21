<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_places', function (Blueprint $table) {
            $table->id();
            $table->string('PlaceName');
            $table->bigInteger('Address_id')->unsigned();
            $table->bigInteger('Doctor_id')->unsigned();
            $table->time('FromTime');
            $table->time('ToTime');
            $table->string('Day');
            $table->foreign('Address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('Doctor_id')->references('id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('work_places');
    }
}
