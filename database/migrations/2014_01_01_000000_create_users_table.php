<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('ic')->unique()->nullable();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->double('salary')->nullable();
            $table->date('startdate')->nullable();
            $table->string('education')->nullable();
            $table->string('jobdescription')->nullable();
            $table->string('role')->nullable();
            $table->date('dob')->nullable();
            $table->bigInteger('phoneno')->nullable();
            $table->string('password');
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
