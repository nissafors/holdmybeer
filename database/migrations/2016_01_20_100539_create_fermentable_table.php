<?php
//----------------------------------------------------------------------
// Generic fermentable and super class for specializations such as
// Grain and MaltExtract.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFermentableTable
 *
 * Generic fermentable and super class for specializations such as Grain and MaltExtract.
 */
class CreateFermentableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Fermentable', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->float('maxHWE');
            $table->integer('degEBC');
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
        Schema::drop('HoldMyBeer_Fermentable');
    }
}
