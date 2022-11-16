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
        Schema::create('AdminEvaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dependability')->nullable();
            $table->integer('qualityofwork')->nullable();
            $table->integer('evaluationid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('AdminEvaluation', function (Blueprint $table) {
            $table->foreign('evaluationid')->references('id')->on('evaluation')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AdminEvaluation');
    }
}
