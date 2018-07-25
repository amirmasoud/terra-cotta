<?php

namespace App;

use App\Tag;
use App\Field;
use App\Group;
use App\Category;
use Illuminate\Database\Eloquent\Model;

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
     * @return hasMany
     */
    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    /**
     * A safe has many groups.
     *
     * @return hasMany
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * A safe belongs to many categories.
     *
     * @return belongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    /**
     * A safe belongs to many tags.
     *
     * @return belongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
