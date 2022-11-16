<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(); // this is working
            $table->date('plandate')->nullable();
            $table->string('status')->nullable();
            $table->longText('suggestion')->nullable();
            $table->integer('userid')->unsigned()->index(); // this is working


        });

        Schema::table('plans', function (Blueprint $table) {
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');

        });


        Schema::table('tasks', function (Blueprint $table) {
            $table->longtext('suggestion')->nullable(); // this is working

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
