<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    protected $fillable = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /* ************************ ACCESSOR ************************* */

    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = \Str::random(10);
    }


    /* ********************** RELATIONSHIPS *********************** */

    public function rooms()
    {
        return $this->morphedByMany(Room::class, 'prop','props');
    }

    public function people()
    {
        return $this->morphedByMany(Person::class, 'prop','props');
    }

    public function items()
    {
        return $this->morphedByMany(Item::class, 'prop','props');
    }
}
