<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('planactivities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(); // this is working
            $table->date('activitiesdate')->nullable();
            $table->string('status')->nullable(); // this is working
            $table->longText('description')->nullable();
            $table->integer('planid')->unsigned()->index(); 
        });

        Schema::table('planactivities', function (Blueprint $table) {
            $table->foreign('planid')->references('id')->on('plans')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planactivities');
    }
}
