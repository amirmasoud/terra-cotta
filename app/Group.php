<?php

namespace App;

use App\Icon;
use App\Field;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon_id'
    ];

    /**
     * A group belong to an icon.
     *
     * @return BelongsTo
     */
    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }

    /**
     * An type has many groups.
     *
     * @return hasMany
     */
    public function groups()
    {
        return $this->hasMany(Field::class);
    }
}
