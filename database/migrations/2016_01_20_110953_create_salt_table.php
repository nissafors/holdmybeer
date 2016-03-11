<?php
//----------------------------------------------------------------------
// WaterTreatment subclass.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSaltTable
 *
 * Watertreatment subclass. A salt used for water treatment.
 */
class CreateSaltTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Salt', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('waterTreatmentId')->unsigned();
            $table->integer('cationId')->unsigned();
            $table->integer('anionId')->unsigned();
            $table->float('cationPpmAtOneGPerL');
            $table->float('anionPpmAtOneGPerL');
            $table->primary('waterTreatmentId');
            $table->foreign('waterTreatmentId')
                ->references('id')
                ->on('HoldMyBeer_WaterTreatment')
                ->onDelete('cascade');
            $table->foreign('cationId')
                ->references('id')
                ->on('HoldMyBeer_Ion')
                ->onDelete('cascade');
            $table->foreign('anionId')
                ->references('id')
                ->on('HoldMyBeer_Ion')
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
        Schema::drop('HoldMyBeer_Salt');
    }
}
