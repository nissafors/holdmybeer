<?php
//----------------------------------------------------------------------
// Fermentable subclass.
//----------------------------------------------------------------------

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSugarTable
 *
 * Fermentable subclass. Sugars in all shapes and forms.
 */
class CreateSugarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoldMyBeer_Sugar', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('fermentableId')->unsigned();
            $table->enum('form', array('Dry', 'Liquid'));
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
        Schema::drop('HoldMyBeer_Sugar');
    }
}
