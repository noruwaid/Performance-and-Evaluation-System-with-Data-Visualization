<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('salesevaluation', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index(); // this is working
            $table->Integer('planning')->nullable();
            $table->Integer('customerservices')->nullable();
            $table->Integer('communication')->nullable();
        });

        Schema::table('salesevaluation', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('evaluation')->onDelete('cascade');
        });

        Schema::table('evaluation', function (Blueprint $table) {
            $table->timestamp('recordeddate');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
