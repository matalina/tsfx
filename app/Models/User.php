<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','api_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* ************************ ACCESSOR ************************* */

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setApiTokenAttribute($value)
    {
        $this->attributes['api_token'] = \Str::random(80);
    }

    /* ********************** RELATIONSHIPS *********************** */

    public function saves()
    {
        return $this->hasMany(Save::class,'user_id','id');
    }
}
