<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriGallery extends Model
{
    //
    public function gallery()
    {
    	return $this->hasMany('App\Gallery','kategori_id');
    }
}
