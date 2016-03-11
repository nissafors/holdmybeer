<?php
//----------------------------------------------------------------------
// Hops for brewing.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateHopTable
 *
 * Hops for brewing.
 */
class CreateHopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Hop', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('countryId')->unsigned();
            $table->integer('typicalAA');
            $table->foreign('countryId')
                ->references('id')
                ->on('HoldMyBeer_Country')
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
        Schema::drop('HoldMyBeer_Hop');
    }
}
