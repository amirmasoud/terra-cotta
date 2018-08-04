<?php

namespace App;

use App\Tag;
use Illuminate\Database\Eloquent\Model;

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
     * @return belonsToMany
     */
    public function safes()
    {
        return $this->belongsToMany(Safe::class)->withTimestamps();
    }
}
