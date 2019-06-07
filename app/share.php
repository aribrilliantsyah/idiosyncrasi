<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class share extends Model
{
    //
    public function count()
    {
    	return $this->belongsTo('App\count','count_id');
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
