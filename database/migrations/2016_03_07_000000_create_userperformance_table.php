<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPerformanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('userperformance', function (Blueprint $table) {
            $table->increments('id');
            $table->date('performancedate')->nullable();
            $table->integer('quantityofworkrating')->nullable();
            $table->integer('initiativerating')->nullable();
            $table->integer('teamworkrating')->nullable();
            $table->integer('attendancerating')->nullable();  
            $table->string('remarks')->nullable();              
            $table->integer('userid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('userperformance', function (Blueprint $table) {
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userpeformance');
    }
}
