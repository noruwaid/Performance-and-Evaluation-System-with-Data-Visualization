<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('adminevaluation', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index(); // this is working
            $table->Integer('teamwork')->nullable();
            $table->Integer('qualityofwork')->nullable();
            $table->Integer('dependability')->nullable();
        });

        Schema::table('adminevaluation', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('evaluation')->onDelete('cascade');
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
