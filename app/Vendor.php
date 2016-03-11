<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    // Vendors of brewing gear and ingredients.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Vendor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'countryId'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the nationality of this vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'countryId');
    }

    /**
     * Get the fermentables produced by this vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fermentables()
    {
        return $this->hasMany('App\Vendor', 'vendorId');
    }

    /**
     * Get the yeasts made by this vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function yeasts()
    {
        return $this->hasMany('App\Yeast', 'vendorId');
    }

    /**
     * Get the water treatment products made by this vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function waterTreatments()
    {
        return $this->hasMany('App\WaterTreatment', 'vendorId');
    }

    /**
     * Get the fining agents produced by this vendor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finings()
    {
        return $this->hasMany('App\Fining', 'vendorId');
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
