<?php

namespace App;

use App\Field;
use Illuminate\Database\Eloquent\Model;

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
     * @return hasMany
     */
    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    /**
     * Return default type model.
     *
     * @return \App\Type
     */
    public static function default()
    {
        return self::orderBy('created_at', 'asc')->first();
    }
}
