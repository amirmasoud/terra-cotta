<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * A field belongs to a safe.
     *
     * @return BelongsTo
     */
    public function safe(): BelongsTo
    {
        return $this->belongsTo(Safe::class);
    }
}
