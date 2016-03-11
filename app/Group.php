<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // Groups of user, for example priliged groups like Admin, but also other conglomerations

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Group';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the users that are members of this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'HoldMyBeer_UserGroup', 'groupId', 'userId');
    }

    /**
     * Get the fermentables owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function fermentables()
    {
        return $this->morphedByMany('App\Fermentable', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }

    /**
     * Get the finings owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function finings()
    {
        return $this->morphedByMany('App\Fining', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }

    /**
     * Get the grain classes owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function grainClasses()
    {
        return $this->morphedByMany('App\GrainClass', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }

    /**
     * Get the grain types owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function grainTypes()
    {
        return $this->morphedByMany('App\GrainType', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }

    /**
     * Get the hops owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function hops()
    {
        return $this->morphedByMany('App\Hop', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }

    /**
     * Get the vendors owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function vendors()
    {
        return $this->morphedByMany('App\Vendor', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }

    /**
     * Get the water treatment products owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function waterTreatments()
    {
        return $this->morphedByMany('App\WaterTreatment', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }

    /**
     * Get the yeasts owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function yeasts()
    {
        return $this->morphedByMany('App\Yeast', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }

    /**
     * Get the yeast classes owned by this group
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function yeastClasses()
    {
        return $this->morphedByMany('App\YeastClass', 'groupOwnable', 'HoldMyBeer_GroupOwnable', 'groupId', 'groupOwnableId');
    }
}
