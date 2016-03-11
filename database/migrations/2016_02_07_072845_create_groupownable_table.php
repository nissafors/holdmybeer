<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupownableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_GroupOwnable', function (Blueprint $table) {
            $table->integer('groupId')->unsigned();
            $table->integer('groupOwnableId')->unsigned();
            $table->string('groupOwnable_type'); // Table name can't be specified in Laravel; must follow this convention
            $table->foreign('groupId')
                ->references('id')
                ->on('HoldMyBeer_Group')
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
        Schema::drop('HoldMyBeer_GroupOwnable');
    }
}
