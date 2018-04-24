<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    public $primaryKey = 'NO_EQUIPMENT';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NO_EQUIPMENT','NO_ASSET', 'DESCRIPTION', 'MIC','BOOK_VALUE', 'CATEGORY', 'PARENT', 'LOCATION', 'CONDITIONS'. 'FIGURE'
    ];

    
}
