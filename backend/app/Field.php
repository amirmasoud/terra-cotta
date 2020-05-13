<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Field extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'value', 'icon_id', 'type_id', 'group_id', 'safe_id', 'featured'
    ];

    /**
     * A field belongs to an icon.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function icon(): belongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    /**
     * A field belongs to a type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function type(): belongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * A field belongs to a group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function group(): belongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * A field belongs to a safe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function safe(): belongsTo
    {
        return $this->belongsTo(Safe::class);
    }
}
