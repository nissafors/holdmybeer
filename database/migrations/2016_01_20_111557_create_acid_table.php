<?php
//----------------------------------------------------------------------
// WaterTreatment subclass.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAcidTable
 *
 * Watertreatment subclass. An acid used for water treatment.
 */
class CreateAcidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Acid', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('waterTreatmentId')->unsigned();
            $table->float('mEqPerL');
            $table->primary('waterTreatmentId');
            $table->foreign('waterTreatmentId')
                ->references('id')
                ->on('HoldMyBeer_WaterTreatment')
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
        Schema::drop('HoldMyBeer_Acid');
    }
}
