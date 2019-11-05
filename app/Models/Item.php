<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'title',
        'name',
        'description',
        'storable_id',
        'storable_type',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];


    /* ************************ ACCESSOR ************************* */


    /* ********************** RELATIONSHIPS *********************** */

    public function items()
    {
        return $this->morphOne(Item::class,'storable');
    }

    public function storable()
    {
        return $this->morphTo(Item::class);
    }
}
