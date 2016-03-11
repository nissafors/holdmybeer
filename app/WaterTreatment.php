<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterTreatment extends Model
{
    // Generic water treatment product and superclass of for example salts and acids.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_WaterTreatment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'form',
        'concentration',
        'vendorId'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the vendor of this water treatment product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendorId');
    }

    /**
     * Get the water treatment products of type salt
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salts()
    {
        return $this->hasMany('App\Salt', 'waterTreatmentId');
    }

    /**
     * Get the water treatment products of type acid
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acids()
    {
        return $this->hasMany('App\Acid', 'waterTreatmentId');
    }

    /**
     * Get all users owning this ingredient
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function users()
    {
        return $this->morphToMany('App\User', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userOwnableId', 'userId');
    }

    /**
     * Get all groups owning this ingredient
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function groups()
    {
        return $this->morphToMany('App\Group', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupOwnableId', 'groupId');
    }
}
