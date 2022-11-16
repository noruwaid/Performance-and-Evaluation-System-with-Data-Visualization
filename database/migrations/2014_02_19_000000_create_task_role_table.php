<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTaskRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TaskRole', function (Blueprint $table) {
            $table->integer('roleid')->unsigned()->index(); // this is working
            $table->integer('taskid')->unsigned()->index(); // this is working
            $table->string('status')->nullable();

           
        });

        Schema::table('taskrole', function (Blueprint $table) {
            $table->foreign('roleid')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('taskid')->references('id')->on('tasks')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskrole');
    }
}
