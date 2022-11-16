<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPerformanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('salesperformance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('communication')->nullable();
            $table->integer('planning')->nullable();
            $table->integer('userperformanceid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('salesperformance', function (Blueprint $table) {
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
        Schema::dropIfExists('salesperformance');
    }
}
