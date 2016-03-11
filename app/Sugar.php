<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugar extends Model
{
    // Simple sugars, subclass of Fermentable

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Sugar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fermentableId',
        'form'
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
     * Get the superclass for this sugar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fermentable()
    {
        return $this->belongsTo('App\Fermentable', 'fermentableId');
    }
}
