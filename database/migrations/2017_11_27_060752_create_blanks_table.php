<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blanks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer')->unsigned();
            $table->integer('newspaper')->unsigned();
            $table->string('date');
            $table->integer('user')->unsigned();
            $table->timestamps();
        });

        Schema::table('blanks', function (Blueprint $table) {
            $table->foreign('customer')->references('id')->on('customers');
            $table->foreign('newspaper')->references('id')->on('newspapers');
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
        Schema::dropIfExists('blanks');
    }
}
