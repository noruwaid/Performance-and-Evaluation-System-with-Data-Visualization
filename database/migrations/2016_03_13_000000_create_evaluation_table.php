<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->date('evaluationdate')->nullable();
            $table->integer('quantityofworkrating')->nullable();
            $table->integer('initiativerating')->nullable();
            $table->integer('teamworkrating')->nullable();
            $table->integer('attendancerating')->nullable();
            $table->double('totalrating')->nullable();    
            $table->string('remarks')->nullable();              
            $table->integer('performanceid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('evaluation', function (Blueprint $table) {
            $table->foreign('performanceid')->references('id')->on('userperformance')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation');
    }
}
