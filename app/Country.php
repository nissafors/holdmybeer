<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    // The countries of the world

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Country';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'countryCode',
        'name'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Return the vendors of this country
     *
     * @return HasMany
     */
    public function vendors()
    {
        return $this->hasMany('App\Vendor', 'countryId');
    }

    /**
     * Get the hops produced in this country
     *
     * @return HasMany
     */
    public function hops()
    {
        return $this->hasMany('App\Hop', 'countryId');
    }
}
