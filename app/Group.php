<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

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
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function icon(): belongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    /**
     * A field has many groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function fields(): hasMany
    {
        return $this->hasMany(Field::class);
    }

    /**
     * A group belongs to a safe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function safe(): belongsTo
    {
        return $this->belongsTo(Safe::class);
    }
}
