<?php

namespace App;

use App\Group;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'class', 'markup',
    ];

    /**
     * An icon has many categories.
     *
     * @return hasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * An icon has many groups.
     *
     * @return hasMany
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
