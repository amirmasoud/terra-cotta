<?php

namespace App;

use App\Icon;
use App\Safe;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon_id',
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
     * A category belongs to an icon.
     *
     * @return \App\Icon
     */
    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }

    /**
     * A category belongs to many safe.
     *
     * @return belonsToMany
     */
    public function safes()
    {
        return $this->belongsToMany(Safe::class)->withTimestamps();
    }
}
