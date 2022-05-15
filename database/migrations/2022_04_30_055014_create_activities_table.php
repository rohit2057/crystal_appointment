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
        Schema::create('activities', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_id')->autoIncrement();
            $table->unsignedBigInteger('o_id');
            $table->foreign('o_id')->references('officer_id')->on('officers');
            $table->unsignedBigInteger('visitor_id')->nullable();
            $table->foreign('visitor_id')->references('v_id')->on('visitors');
            $table->string('name');
            $table->string('type');
            $table->string('status');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamp('added_on');
            $table->rememberToken();
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
        Schema::dropIfExists('activities');
    }
};
