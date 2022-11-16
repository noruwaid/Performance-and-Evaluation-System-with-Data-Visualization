<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamworkPerformanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('teamworkperformance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating')->nullable();
            $table->integer('userperformanceid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('teamworkperformance', function (Blueprint $table) {
            $table->foreign('userperformanceid')->references('id')->on('userperformance')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teamworkperformance');
    }
}
