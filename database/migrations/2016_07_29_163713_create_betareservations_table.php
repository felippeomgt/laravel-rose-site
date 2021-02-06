<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetareservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Betareservations', function ($table) {
            $table->string('Email');
            $table->primary('Email');
            $table->text('reason');
            $table->boolean('accepted')->default(false);
            $table->boolean('check')->default(false);
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
        Schema::drop('Betareservations');
    }
}
