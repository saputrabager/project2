<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $primaryKey = 'NO_ASSET';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'DESCRIPTION', 'MIC', 'CATEGORY', 'PARENT', 'LOCATION', 'CONDITIONS'. 'FIGURE'
    ];

    
}
