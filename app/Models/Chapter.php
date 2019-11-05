<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [


    ];

    protected $hidden = [

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

    public function scenes()
    {
        return $this->hasMany(Scene::class);
    }
}
