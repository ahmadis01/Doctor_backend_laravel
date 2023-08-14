<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->string("Email");
            $table->string("Password");
            $table->string("FcmToken")->nullable();
            $table->integer("Age")->nullable();
            $table->boolean("Smoked")->nullable();
            $table->date("BirthDate")->nullable();
            $table->bigInteger('Address_id')->unsigned();
            $table->foreign('Address_id')->references('id')->on('addresses')->onDelete('cascade');
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
        Schema::dropIfExists('patients');
    }
}
