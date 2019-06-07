<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriPost extends Model
{
    //
    public function post()
    {
    	return $this->hasMany('App\Post','kategori_id');
    }
}
