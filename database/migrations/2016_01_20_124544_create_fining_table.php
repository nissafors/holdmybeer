<?php
//----------------------------------------------------------------------
// Fining agents for brewing.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFiningTable
 *
 * Fining agents for brewing.
 */
class CreateFiningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Fining', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
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
        Schema::drop('HoldMyBeer_Fining');
    }
}
