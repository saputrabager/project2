<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    // public $primaryKey = 'NO_ASSET';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NO_ASSET','NO_EQUUIPMENT', 'DESCRIPTION', 'MIC','BOOK_VALUE', 'CATEGORY', 'PARENT', 'LOCATION', 'CONDITIONS'. 'FIGURE'
    ];

    
}
