<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //here we bring which table (posts table) we want to work with to add the user_id column
        Schema::table('posts', function (Blueprint $table) {
            //we add here 
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //if you wanna drop this column for some reason
            $table->dropColumn('user_id');
        });
    }
}
