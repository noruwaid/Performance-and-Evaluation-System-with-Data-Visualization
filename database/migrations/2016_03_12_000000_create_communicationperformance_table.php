<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationPerformanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('communicationperformance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating')->nullable();
            $table->integer('salesperformanceid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('communicationperformance', function (Blueprint $table) {
            $table->foreign('salesperformanceid')->references('id')->on('salesperformance')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communicationperformance');
    }
}
