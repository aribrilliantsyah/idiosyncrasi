<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_kategori extends Model
{
    //
    public function post()
    {
    	return $this->hasMany('App\post','kategori_id');
    }
}
