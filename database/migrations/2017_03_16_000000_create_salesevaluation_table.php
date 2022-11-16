<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesalesevaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('salesevaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planning')->nullable();
            $table->integer('communication')->nullable();
            $table->integer('evaluationid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('salesevaluation', function (Blueprint $table) {
            $table->foreign('evaluationid')->references('id')->on('evaluation')->onDelete('cascade');
            });

    Schema::table('userperformance', function (Blueprint $table) {
            $table->string('status')->default('Not Yet Evaluated');
                });
                
                Schema::table('teamworkperformance', function (Blueprint $table) {
                    $table->integer('evaluatedby')->unsigned()->index()->nullable(); // this is working
                    $table->foreign('evaluatedby')->references('id')->on('users')->onDelete('cascade');
        
                        });
        
                Schema::table('communicationperformance', function (Blueprint $table) {
                            $table->integer('evaluatedby')->unsigned()->index()->nullable(); // this is working
                            $table->foreign('evaluatedby')->references('id')->on('users')->onDelete('cascade');
        
                                });
                            

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesevaluation');
    }
}
