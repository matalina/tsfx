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

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/rooms/'.$this->getKey());
    }

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
