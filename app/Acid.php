<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acid extends Model
{
    // Acids for brewing water adjustments. Subclass of WaterTreatment.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Acid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'waterTreatmentId',
        'mEqPerL',
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
     * Get the WaterTreatment superclass of this acid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function waterTreatment()
    {
        return $this->belongsTo('App\WaterTreatment', 'waterTreatmentId');
    }
}
