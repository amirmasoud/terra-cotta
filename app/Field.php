<?php

namespace App;

use App\Icon;
use App\Type;
use App\Group;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'value', 'icon_id', 'type_id', 'group_id'
    ];

    /**
     * A field belongs to an icon.
     *
     * @return \App\Icon
     */
    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }

    /**
     * A field belongs to a type.
     *
     * @return \App\Type
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * A field belongs to a group.
     *
     * @return \App\Group
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
