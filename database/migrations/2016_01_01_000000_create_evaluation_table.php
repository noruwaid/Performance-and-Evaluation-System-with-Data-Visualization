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
            $table->text('remarks')->nullable();
            $table->Integer('quantityofworkrating')->nullable();
            $table->Integer('initiativerating')->nullable();
            $table->Integer('attendancerating')->nullable();
            $table->double('totalrating'); // this is working
            $table->integer('userid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('evaluation', function (Blueprint $table) {
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
        Schema::dropIfExists('sales');
    }
}
