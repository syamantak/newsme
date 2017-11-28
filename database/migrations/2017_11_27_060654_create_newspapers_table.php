<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewspapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newspapers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user')->unsigned();
            $table->timestamps();
        });

        Schema::table('newspapers', function (Blueprint $table) {
            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newspapers');
    }
}
