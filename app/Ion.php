<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ion extends Model
{
    // An ion, no less, no more.

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'HoldMyBeer_Ion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'symbol',
        'charge',
        'name'
    ];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Return the salts in which this ion is the cation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cationInSalts()
    {
        return $this->hasMany('App\Salt', 'cationId');
    }

    /**
     * Return the salts in which this ion is the anion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anionInSalts()
    {
        return $this->hasMany('App\Salt', 'anionId');
    }
}
