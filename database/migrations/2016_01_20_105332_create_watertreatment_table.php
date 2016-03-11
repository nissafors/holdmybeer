<?php
//----------------------------------------------------------------------
// Generic water treatment product and super class for specializations
// such as Salt and Acid.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateWatertreatmentTable
 *
 * Generic water treatment product and super class for specializations such as Salt and Acid.
 */
class CreateWatertreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_WaterTreatment', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->enum('form', array('Dry', 'Liquid'));
            $table->integer('concentration');
            $table->integer('vendorId')->unsigned()->nullable();
            $table->foreign('vendorId')
                ->references('id')
                ->on('HoldMyBeer_Vendor')
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
        Schema::drop('HoldMyBeer_WaterTreatment');
    }
}
