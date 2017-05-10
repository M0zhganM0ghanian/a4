<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('interest_user', function (Blueprint $table) {

          $table->increments('id');
          $table->timestamps();
          $table->integer('user_id')->unsigned();
          $table->integer('interest_id')->unsigned();

          # Make foreign keys
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('interest_id')->references('id')->on('interests');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('interest_user');
    }
}