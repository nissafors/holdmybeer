<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserownableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_UserOwnable', function (Blueprint $table) {
            $table->integer('userId')->unsigned();
            $table->integer('userOwnableId')->unsigned();
            $table->string('userOwnable_type'); // Table name can't be specified in Laravel; must follow this convention
            $table->foreign('userId')
                ->references('id')
                ->on('HoldMyBeer_Users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('HoldMyBeer_UserOwnable');
    }
}
