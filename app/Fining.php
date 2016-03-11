<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fining extends Model
{
    // Fining agents for brewing.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Fining';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'vendorId'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the vendor making this fining agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendorId');
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
