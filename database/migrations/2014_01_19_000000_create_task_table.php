<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('status');
            $table->timestamp('startdate');
            $table->datetime('enddate');
            $table->longText('content')->nullable();          
            $table->string('filepath')->nullable();   
            $table->timestamp('created');
            $table->datetime('submitted')->nullable();
            $table->string('helpstatus')->nullable();
            $table->string('boolhelpstatus')->default(0);
            $table->longText('suggestion')->nullable();          

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
