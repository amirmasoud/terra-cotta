<?php

namespace App;

use App\Icon;
use App\Safe;
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
        'name', 'icon_id', 'safe_id'
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
     * A field has many groups.
     *
     * @return hasMany
     */
    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    /**
     * A group belongs to a safe.
     *
     * @return belongsTo
     */
    public function safe()
    {
        return $this->belongsTo(Safe::class);
    }
}
