<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fermentable extends Model
{
    // Generic fermentable and superclass of for example grains and sugars.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Fermentable';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'maxHWE',
        'degEBC',
        'mash',
        'steep',
        'vendorId'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the vendor of this fermentable
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor() {
        return $this->belongsTo('App\Vendor', 'vendorId');
    }

    /**
     * Get the fermentables of type grain.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grains()
    {
        return $this->hasMany('App\Grain', 'fermentableId');
    }

    /**
     * Get the fermentables of type malt extract.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maltExtracts()
    {
        return $this->hasMany('App\MaltExtract', 'fermentableId');
    }

    /**
     * Get the fermentables of type sugar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sugars()
    {
        return $this->hasMany('App\Sugar', 'fermentableId');
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
