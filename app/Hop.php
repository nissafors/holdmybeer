<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hop extends Model
{
    // Hops for brewing.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Hop';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'countryId',
        'typicalAA'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the country producing this hop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'countryId');
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

    public function prepareForWithInclusion()
    {
        $this->attributes['country'] = $this->attributes['name'];
        unset($this->attributes['name']);
        unset($this->attributes['id']);
    }
}
