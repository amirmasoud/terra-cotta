<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * An type has many fields.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function fields(): hasMany
    {
        return $this->hasMany(Field::class);
    }

    /**
     * Return default type model.
     *
     * @return \App\Type
     */
    public static function default(): Type
    {
        return self::orderBy('created_at', 'asc')->first();
    }
}
