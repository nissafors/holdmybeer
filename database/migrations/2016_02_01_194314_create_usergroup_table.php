<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsergroupTable
 *
 * Bind users table to group table in a many to many relationship.
 */
class CreateUsergroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_UserGroup', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('userId')->unsigned();
            $table->integer('groupId')->unsigned();
            $table->primary(array('userId', 'groupId'));
            $table->foreign('userId')
                ->references('id')
                ->on('HoldMyBeer_Users')
                ->onDelete('cascade');
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
        Schema::drop('HoldMyBeer_UserGroup');
    }
}
