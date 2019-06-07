<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class count extends Model
{
    //
    public function alocation()
    {
    	return $this->hasOne('App\share','count_id');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'ket' => 'array',
    ];

}
