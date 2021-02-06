<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Orders', function ($table) {
            $table->string('paymentid')->unique();
            $table->primary('paymentid');
            $table->string('payerid')->nullable();
            $table->string('saleid')->nullable();
            $table->string('State');
            $table->string('account');
            $table->integer('points');
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Orders');
    }
}
