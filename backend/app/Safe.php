<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Safe extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'safes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * A safe has many fields.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function fields(): hasMany
    {
        return $this->hasMany(Field::class);
    }

    /**
     * A safe has many groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function groups(): hasMany
    {
        return $this->hasMany(Group::class);
    }

    /**
     * A safe belongs to many categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function categories(): belongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    /**
     * A safe belongs to many tags.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
