<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YeastClass extends Model
{
    // Yeast strain classes such as ale, lager, cider etc.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_YeastClass';

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
     * Get the yeasts in this yeast class.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function yeasts()
    {
        return $this->hasMany('App\Yeast', 'classId');
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
