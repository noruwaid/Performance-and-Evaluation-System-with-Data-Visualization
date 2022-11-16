<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('userattendance', function (Blueprint $table) {
            $table->integer('userid')->unsigned()->index(); // this is working
            $table->integer('attendanceid')->unsigned()->index(); // this is working
            $table->string('status')->nullable();
            $table->string('timestatus')->nullable();

        });

        Schema::table('userattendance', function (Blueprint $table) {
            $table->foreign('attendanceid')->references('id')->on('attendances')->onDelete('cascade');
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
        Schema::dropIfExists('userattendances');
    }
}
