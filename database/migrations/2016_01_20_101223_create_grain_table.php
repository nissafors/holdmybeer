<?php
//----------------------------------------------------------------------
// Fermentable subclass.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGrainTable
 *
 * Fermentable subclass. A grain could be, for example, "Pale ale malt" or "Flaked barley".
 */
class CreateGrainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Grain', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('fermentableId')->unsigned();
            $table->integer('typeId')->unsigned();
            $table->integer('classId')->unsigned();
            $table->boolean('mash')->default(false);
            $table->boolean('steep')->default(false);
            $table->primary('fermentableId');
            $table->foreign('fermentableId')
                ->references('id')
                ->on('HoldMyBeer_Fermentable')
                ->onDelete('cascade');
            $table->foreign('typeId')
                ->references('id')
                ->on('HoldMyBeer_GrainType')
                ->onDelete('cascade');
            $table->foreign('classId')
                ->references('id')
                ->on('HoldMyBeer_GrainClass')
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
        Schema::drop('HoldMyBeer_Grain');
    }
}
