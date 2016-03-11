<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yeast extends Model
{
    // Yeast product and its characteristics.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Yeast';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'vendorId',
        'vendorsProductId',
        'classId',
        'alcoholTolerance',
        'minAttenuation',
        'maxAttenuation',
        'minFermentationTemp',
        'maxFermentationTemp',
        'minRehydrationTemp',
        'maxRehydrationTemp',
        'flocculation',
        'form'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the yeast class of this yeast
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yeastClass()
    {
        return $this->belongsTo('App\YeastClass', 'classId');
    }

    /**
     * Get the vendor of this yeast
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
