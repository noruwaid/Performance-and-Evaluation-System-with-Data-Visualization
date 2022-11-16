<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->double('commissionprice')->nullable();
            $table->date('remarksdate')->nullable();
            $table->double('commissionpercent')->nullable();
            $table->string('unitname')->nullable();
            $table->string('purchasername')->nullable();
            $table->double('netprice')->nullable();
            $table->date('dateofloanapproved')->nullable();
            $table->double('finalselling')->nullable();
            $table->timestamp('createdat'); // this is working
            $table->integer('userid')->unsigned()->index()->nullable(); // this is working
            $table->integer('propertyid')->unsigned()->index()->nullable(); // this is working
            $table->integer('planid')->unsigned()->index()->nullable(); // this is working
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('planid')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('propertyid')->references('id')->on('properties')->onDelete('cascade');
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
