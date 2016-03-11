<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaltExtract extends Model
{
    // Malt extract, subclass of Fermentable

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_MaltExtract';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fermentableId',
        'form',
        'prehopped'
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
     * Get the superclass for this malt extract
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fermentable()
    {
        return $this->belongsTo('App\Fermentable', 'fermentableId');
    }
}
