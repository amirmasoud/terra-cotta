<?php

namespace App;

// use Pepper\HasEndpoint;
// use Pepper\InteractsWithEndpoint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    // use InteractsWithEndpoint;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon_id', 'user_id'
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
     * A category belongs to many key.
     *
     * @return BelongsToMany
     */
    public function keys()
    {
        return $this->belongsToMany(Key::class)->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
