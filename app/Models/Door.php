<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    protected $fillable = [
        'direction',
        'is_locked',
        'key',
        'password',
        'room_a',
        'room_b',
    
    ];
    
    protected $hidden = [
        'password',
    
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/doors/'.$this->getKey());
    }
    
    /* ********************** RELATIONSHIPS *********************** */
    
    public function from() // room A
    {
       return $this->hasOne(Room::class,'room_a','id');
    }
    
    public function to() // room B
    {
        return $this->hasOne(Room::class,'room_b','id');
    }
}
