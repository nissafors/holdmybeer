<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the groups that this user is a member of
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('App\Group', 'HoldMyBeer_UserGroup', 'userId', 'groupId');
    }

    /**
     * Get the fermentables owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function fermentables()
    {
        return $this->morphedByMany('App\Fermentable', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }

    /**
     * Get the finings owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function finings()
    {
        return $this->morphedByMany('App\Fining', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }

    /**
     * Get the grain classes owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function grainClasses()
    {
        return $this->morphedByMany('App\GrainClass', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }

    /**
     * Get the grain types owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function grainTypes()
    {
        return $this->morphedByMany('App\GrainType', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }

    /**
     * Get the hops owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function hops()
    {
        return $this->morphedByMany('App\Hop', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }

    /**
     * Get the vendors owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function vendors()
    {
        return $this->morphedByMany('App\Vendor', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }

    /**
     * Get the water treatment products owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function waterTreatments()
    {
        return $this->morphedByMany('App\WaterTreatment', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }

    /**
     * Get the yeasts owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function yeasts()
    {
        return $this->morphedByMany('App\Yeast', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }

    /**
     * Get the yeast classes owned by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function yeastClasses()
    {
        return $this->morphedByMany('App\YeastClass', 'userOwnable', 'HoldMyBeer_UserOwnable', 'userId', 'userOwnableId');
    }
}
