<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Icon extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'class',
    ];

    /**
     * An icon has many categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function categories(): hasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * An icon has many groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function groups(): hasMany
    {
        return $this->hasMany(Group::class);
    }

    /**
     * An icon has many fields.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function fields(): hasMany
    {
        return $this->hasMany(Field::class);
    }
}
