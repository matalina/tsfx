<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'title',
        'name',
        'description',

    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    /* ************************ ACCESSOR ************************* */

    /* ********************** RELATIONSHIPS *********************** */

    public function exits()
    {
        return $this->hasMany(Door::class,'room_a','id');
    }

    public function items()
    {
        return $this->morphOne(Item::class,'storable');
    }

    public function people()
    {
        return $this->hasMany(Person::class,'location','id');
    }

}
