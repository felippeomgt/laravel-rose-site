<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('UserInfo', function ($table) {
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('UserInfo', function ($table) {
            $table->dropColumn('remember_token');
            $table->dropColumn('updated_at');
            $table->dropColumn('created_at');
        });
    }
}
