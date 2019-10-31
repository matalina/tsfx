<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'full_name',
        'name',
        'description',
        'is_self',
        'always_on_person',
        'location',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/people/'.$this->getKey());
    }

    /* ********************** RELATIONSHIPS *********************** */

    public function items()
    {
        return $this->morphOne(Item::class,'storable');
    }

    public function room()
    {
        return $this->hasOne(Room::class,'id','location');
    }
}
