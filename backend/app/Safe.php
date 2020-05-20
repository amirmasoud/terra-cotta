<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * A safe belongs to a user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A safe has many fields.
     *
     * @return HasMany
     */
    public function fields(): HasMany
    {
        return $this->HasMany(Field::class);
    }

    /**
     * A safe belongs to many categories.
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->BelongsToMany(Category::class)->withTimestamps();
    }

    /**
     * A safe belongs to many tags.
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->BelongsToMany(Tag::class)->withTimestamps();
    }
}
