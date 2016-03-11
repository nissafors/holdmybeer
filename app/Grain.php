<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Grain extends Model
{
    // Brewing grains, subclass of fermentable.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Grain';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fermentableId',
        'typeId',
        'classId',
        'mash',
        'steep'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Defines the primary key for this table
     *
     * @var string
     */
    protected $primaryKey = 'fermentableId';

    /**
     * Get the superclass for this grain
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fermentable()
    {
        return $this->belongsTo('App\Fermentable', 'fermentableId');
    }

    /**
     * Get the grainclass of this grain
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grainClass()
    {
        return $this->belongsTo('App\GrainClass', 'classId');
    }

    /**
     * Get the graintype of this grain
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grainType()
    {
        return $this->belongsTo('App\GrainType', 'typeId');
    }
}
