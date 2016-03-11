<?php
//----------------------------------------------------------------------
// Beer ingredient and equipment vendors.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVendorTable
 *
 * Vendors of brewing gear and ingredients.
 */
class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Vendor', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('countryId')->unsigned()->nullable();
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
        Schema::drop('HoldMyBeer_Vendor');
    }
}
