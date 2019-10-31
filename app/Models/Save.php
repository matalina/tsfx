<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $fillable = [
        'user_id',
        'key',
        'name',
        'last_saved_at',
        'state',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'last_saved_at',
    ];
    
    public function getRouteKeyName()
    {
        return 'key';
    }
    
    /* ********************** RELATIONSHIPS *********************** */
    
}
