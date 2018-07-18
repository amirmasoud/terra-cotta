<?php

namespace App;

use App\Field;
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
}
