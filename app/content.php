<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    //
    protected $casts = [
    	'ket' => 'array',
    ];
}
