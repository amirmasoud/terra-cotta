<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot',
    ];

    /**
     * A tag belongs to a safe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function safes(): belongsToMany
    {
        return $this->belongsToMany(Safe::class)->withTimestamps();
    }
}
