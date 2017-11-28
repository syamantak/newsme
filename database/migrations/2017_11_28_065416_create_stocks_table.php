<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('newspaper')->unsigned();
            $table->string('quantity');
            $table->string('price');
            $table->string('date');
            $table->string('sold')->nullable();
            $table->integer('user')->unsigned();
            $table->timestamps();
        });

        Schema::table('stocks', function (Blueprint $table) {
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
        Schema::dropIfExists('stocks');
    }
}
