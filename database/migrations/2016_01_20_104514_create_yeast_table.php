<?php
//----------------------------------------------------------------------
// Yeast product and its characteristics.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateYeastTable
 *
 * Yeast product and its characteristics.
 */
class CreateYeastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Yeast', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('vendorId')->unsigned();
            $table->string('vendorsProductId');
            $table->integer('classId')->unsigned();
            $table->integer('alcoholTolerance');
            $table->integer('minAttenuation');
            $table->integer('maxAttenuation');
            $table->integer('minFermentationTemp');
            $table->integer('maxFermentationTemp');
            $table->integer('minRehydrationTemp')->nullable();
            $table->integer('maxRehydrationTemp')->nullable();
            $table->enum('flocculation', array('Low', 'Medium', 'High'));
            $table->enum('form', array('Dry', 'Liquid', 'Agar'));
            $table->foreign('vendorId')
                ->references('id')
                ->on('HoldMyBeer_Vendor')
                ->onDelete('cascade');
            $table->foreign('classId')
                ->references('id')
                ->on('HoldMyBeer_YeastClass')
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
        Schema::drop('HoldMyBeer_Yeast');
    }
}
