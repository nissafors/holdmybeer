<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salt extends Model
{
    // Salts for brewing water adjustments. Subclass of WaterTreatment.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Salt';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'waterTreatmentId',
        'cationId',
        'anionId',
        'cationPpmAtOneGPerL',
        'anionPpmAtOneGPerL'
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
    protected $primaryKey = 'waterTreatmentId';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function waterTreatment()
    {
        return $this->belongsTo('App\WaterTreatment', 'waterTreatmentId');
    }

    /**
     * Get the cation in this salt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cation()
    {
        return $this->belongsTo('App\Ion', 'cationId');
    }

    /**
     * Get the anion in this salt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anion()
    {
        return $this->belongsTo('App\Ion', 'anionId');
    }
}
