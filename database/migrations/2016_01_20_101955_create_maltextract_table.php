<?php
//----------------------------------------------------------------------
// Fermentable subclass.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMaltextractTable
 *
 * Fermentable subclass. Dry och liquid, possibly pre-hopped, malt extracts.
 */
class CreateMaltextractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_MaltExtract', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('fermentableId')->unsigned();
            $table->enum('form', array('Dry', 'Liquid'));
            $table->boolean('prehopped');
            $table->primary('fermentableId');
            $table->foreign('fermentableId')
                ->references('id')
                ->on('HoldMyBeer_Fermentable')
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
        Schema::drop('HoldMyBeer_MaltExtract');
    }
}
