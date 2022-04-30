<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workingdays', function (Blueprint $table) {
            $table->id('w_id');
            $table->unsignedBigInteger('officer_id');
            $table->foreign('officer_id')->references('officer_id')->on('officers');
            $table->string('days_of_week');
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
        Schema::dropIfExists('workingdays');
    }
};
