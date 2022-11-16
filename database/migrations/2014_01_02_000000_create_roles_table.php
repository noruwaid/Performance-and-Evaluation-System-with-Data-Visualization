<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('userid')->unsigned()->index(); // this is working

      });

      Schema::table('roles', function (Blueprint $table) {
        $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
      /*
        id
        name
        ic
        email
        address
        salary
        startdate
        education
        jobdescription
        role
        dob
        phoneno
        password
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
